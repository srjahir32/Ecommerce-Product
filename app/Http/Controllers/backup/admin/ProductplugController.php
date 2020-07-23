<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Productplug;
use Illuminate\Support\Str;

class ProductplugController extends Controller
{
    public function createlink(Request $request){
        $input = $request->all();
        // return $input;
        $product_name = Product::where('id', $input['choose_product_id'])->value('product_name');
        // return $product_name;
        $input['product_name'] = $product_name;
        $input['product_id'] = $input['choose_product_id'];
        $input['payment_type'] = $input['paymnet_type'];
        $input['code'] = str::random(8);
//    return $input;
        Productplug::create($input);
        $checkout_link =  url('/'.$input['code']);

        return response()->json(['product_id' => $input['product_id'], 'checkout_link' => $checkout_link, 'product_name'  => $product_name, 'payment_type'  => $input['payment_type']]);
    }

    public function redirectlink($code){
        return redirect('cart/'.$code);
    }

    public function cartlink($code){
        $user_id = session()->get('user')['id'];
        $product_id = Productplug::where('code', $code)->value('product_id');
        $Bearer_token = session()->get('token');
        $data = [
            'product_id' => $product_id,
        ];
        $request = Request::create(url('/api/products/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $cartproduct = json_decode($res->getContent(), true); 
        
        $request = Request::create(url('/api/user_details'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $userdetails = json_decode($res->getContent(), true); 

        $request = Request::create(url('/api/products/viewimage'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $productimg = json_decode($res->getContent(), true); 
        
        return view('front.pages.checkout', compact("cartproduct", "userdetails", "productimg"));
    }
}
