<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function redirectlink(){
        return redirect('cart/'.$code);
    }

    public function cartlink(){
        $product_id = Productplug::where('code', $code)->value('product_id');
        $Bearer_token = "";
        $data = [
            'product_id' => $product_id,
        ];
        $request = Request::create('/api/products/view', 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true); 
        // return $response['status'];
        // if($response['status'] == 1) {
        //     $token = $response['success']['token'];
        //     session()->put('token', $token);
        // }
        return response()->json(['data' =>$response]);
    }
}
