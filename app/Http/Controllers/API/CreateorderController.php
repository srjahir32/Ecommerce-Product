<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Order;

class CreateorderController extends Controller
{
    // 1. create order
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);
        $product_id = $request->input("product_id");
        $order_details = $request->input("order_details");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $insert_user_business = Order::insert(['product_id' => $product_id, 'order_details' => $order_details]);
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'create order successfully.']);     
    }
}
