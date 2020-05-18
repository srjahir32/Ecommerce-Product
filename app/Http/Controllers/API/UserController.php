<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    // 1. user login
    public function login(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0'], 401);            
        }
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
           $user = Auth::user(); 
           $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success, 'status'=>'1'], $this-> successStatus); 
        } else{ 
            return response()->json(['error'=>'Invalid Login details'], 401); 
        } 
    }

    // 2. user register
    public function register(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ],
        [
            'c_password.required' => 'The confirm password field is required.',
            'c_password.same' => 'The confirm password and password must match.',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->first_name." ".$user->last_name;
        return response()->json(['success'=>$success], $this-> successStatus); 
    }

    // 3. user logout
    public function logout() {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json(['success' => 'Successfully logged out'], $this-> successStatus);
    }

    // 4. user details
    public function userdetails() { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
