<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Order;

class CreateorderController extends Controller
{
    // 1. view all order
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        $user_id = $request->input("user_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $order = Order::where('user_id', $user_id)->get();
        if($order->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$order]);     
    }

    // 2. create order
    public function create(Request $request) {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $insert_order = Order::create($input);
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'create order successfully.']);     
    }

    // 3. view single order
    public function view(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        $order_id = $request->input("order_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $view_order = Order::where('id', $order_id)->get();
        if($view_order->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$view_order]);     
    }

    public function approve(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        $order_id = $request->input("order_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $approve = Order::where('id', $order_id)->update(['order_status' => '1']);
        if ($approve != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }   
    }

    public function paid(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        $order_id = $request->input("order_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $paid = Order::where('id', $order_id)->update(['order_status' => '2']);
        if ($paid != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }   
    }

    public function remove(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        $order_id = $request->input("order_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $remove = Order::where('id', $order_id)->delete();
        if ($remove != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }   
    }
}
