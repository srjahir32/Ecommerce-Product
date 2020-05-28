<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route, URL;
use Session;

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
        $request = Request::create(url('/api/login'), 'POST', $data);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);
        if($response['status'] != '0') {
            $token = $response['success']['token'];
            $user = $response['user'];
            session()->put('token', $token);
            session()->put('user', $user);
        }   
       
        // return $response;   
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
 
    $request = Request::create(url('/api/register'), 'POST', $data);
    $res = app()->handle($request);
    $response = json_decode($res->getContent(), true);
    
    return response()->json(['data' =>$response]);   

   }
   public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login');
   }
}