<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Order;

class CustomerController extends Controller
{
    // 1. view all customer
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        $user_id = $request->input("user_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
       $customer = Order::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->unique('customer_email');
        if($customer->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$customer]);     
    }
    public function search(Request $request) { 
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'keyword' => 'required',
        ]);
        $search = $request->input('keyword');
        $user_id = $request->input("user_id");
        if ($validator->fails()) { 
            return response()->json(['message'=>$validator->errors(), 'status'=>'0']);            
        }

        $search_customer = Order::where('user_id', $user_id)->whereRaw(" (customer_name like ? or customer_email like ? or country like ?) ",["%{$search}%","%{$search}%","%{$search}%"])->get();

        if($search_customer->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$search_customer]);
    }
}
