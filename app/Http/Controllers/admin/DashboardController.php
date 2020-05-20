<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class DashboardController extends Controller
{
   
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
   }

}