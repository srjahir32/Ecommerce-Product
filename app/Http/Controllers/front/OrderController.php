<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function saveorderdetail(Request $request){
        $input =  $request->all();
        // return $input;
        $user_id = session()->get('user_id');
        $Bearer_token = session()->get('token');
        $data = [
            'user_id' => $user_id,
            'product_id' => $input['product_id'],
            'customer_name' => $input['name'],
            'customer_email' => $input['email'],
            'address' => $input['address'],
            'city' => $input['city'],
            'state' => $input['state'],
            'zip' => $input['zip'],
            'country' => $input['country'],
            'product_name' => $input['product_name'],
            'price' => $input['product_price'],
            'quantity' => $input['cart_item'],
            'total' => $input['product_total_price'],
        ];
        $request = Request::create(url('/api/order/create'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $order_data = json_decode($res->getContent());

        return response()->json(['data' => $order_data]);
    }
}
