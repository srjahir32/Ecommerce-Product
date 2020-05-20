<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route, URL;
class LoginregisterController extends Controller
{

    public function index(){
        return view('admin.pages.login');
    }

    public function login(Request $request){
        $input = request()->all();
        $data = [
            'email' => $input['email'],
            'password' => $input['password'],
        ];
        $request = Request::create('/api/login', 'POST', $data);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);
        if($response['status'] != '0') {
            $token = $response['success']['token'];
            session()->put('token', $token);
        }      
        return response()->json(['data' =>$response]);
    }

    public function careteuser(){
        return view('admin.pages.signup');
    }
    
    public function storeuser(Request $request){
        $input = request()->all();
       
       $data = [
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'email' => $input['email'],
        'password' => $input['password'],
        'c_password' => $input['c_password'],
    ];
    $request = Request::create('/api/register', 'POST', $data);
    $response = Route::dispatch($request);
    $res = app()->handle($request);
    $response = json_decode($res->getContent(), true); 
    return response()->json(['data' =>$response]);   

   }
   public function logout(){
    $Bearer_token = session()->get('token');
    $request = Request::create(url('/api/user_details'), 'POST');
    $request->headers->set('Accept', 'application/json');
    $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
    $res = app()->handle($request);
    $response = json_decode($res->getContent()); 
    session()->forget('token');
    return  $response;
    // return view('admin.pages.login')->with('data', $response);
    return redirect()->route('login')->with('response',$response);
   }

//    public function userdetail(){
       
//        $path =  URL();
//         $Bearer_token = session()->get('token');
//         $request = Request::create(url('/api/user_details'), 'POST');
//         $request->headers->set('Accept', 'application/json');
//         $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
//         $res = app()->handle($request);
//         $response = json_decode($res->getContent()); 
//         // return response()->json(['data' =>$response ]);
//         return view('admin.layout.main', compact('response'));
//    }
}