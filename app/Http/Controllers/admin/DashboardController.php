<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;


class DashboardController extends Controller
{
<<<<<<< HEAD
   
    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index(){
    // return view('admin.pages.dashboard');         
      $path =  URL();
      $Bearer_token = session()->get('token');
      $request = Request::create(url('/api/user_details'), 'POST');
      $request->headers->set('Accept', 'application/json');
      $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
      $res = app()->handle($request);
      $response = json_decode($res->getContent()); 
      // return response()->json(['data' =>$response ]);
      return view('admin.pages.dashboard', compact('response'));
=======
   public function index() {
        $url = url('/api/user_details');
        $ch = curl_init($url);
        $Bearer_token = session()->get('token');
        $headers = array(
                'Authorization: Bearer '.$Bearer_token
                );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        $response = curl_exec($ch);    
            if (!curl_exec($ch)) {
                echo 'An error has occurred: ' . curl_error($ch);
            }
            else {
                $json_data = json_decode($response, true);
                //print_r($json_data);
                return view('admin.pages.dashboard', compact('json_data'));
            }
>>>>>>> 5c17a2837d976bd79e0fbef7d81bb0b7bb04753f
   }

}