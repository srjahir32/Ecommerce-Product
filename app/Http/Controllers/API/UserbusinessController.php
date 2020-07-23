<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Userbusiness;

class UserbusinessController extends Controller
{
    // 1. create user business
    public function create(Request $request) {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|unique:user_business',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $insert_user_business = Userbusiness::create($input);
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'insert user business successfully.']);     
    }

    // 2. view user business
    public function view(Request $request) {
        $user_id = $request->input('user_id');
        $validator = Validator::make($request->all(), [
            'user_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $view_user_business = Userbusiness::where('user_id', $user_id)->get();
        if($view_user_business->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$view_user_business]);   
    }

    // 3. edit user business
    public function edit(Request $request) {
        $user_id = $request->input('user_id');
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        $business_name = $request->input('business_name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $postal_code = $request->input('postal_code');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $timezone = $request->input('timezone');
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $update_user_business = Userbusiness::where('user_id', $user_id)->update(['business_name' => $business_name, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'postal_code' => $postal_code, 'email' => $email, 'phone' => $phone, 'timezone' => $timezone]);
        if ($update_user_business != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }
    }
}