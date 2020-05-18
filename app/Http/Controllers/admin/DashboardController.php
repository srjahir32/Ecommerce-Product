<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class DashboardController extends Controller
{
   public function index(){
    return view('admin.pages.dashboard');
            $Bearer_token = session()->get('token');
            $request = Request::create('/api/user_details', 'POST');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); 
            
    return view('admin.layout.main')->with('user', json_decode($res->getContent(), true));
   }

}