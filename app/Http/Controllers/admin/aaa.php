<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productplug;
use Illuminate\Support\Str;
class ProductplugController extends Controller
{
    public function createlink(Request $request){
        $input = $request->all();
        return $input;
        $input['product_id'] = '5';
        $input['payment_type'] = '5';
        $input['code'] = str::random(8);
   
        Productplug::create($input);
        $checkout_link =  url('/'.$input['code']);

        return response()->json(['product_id' => $input['product_id'], 'checkout_link' => $checkout_link,  ]);
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
