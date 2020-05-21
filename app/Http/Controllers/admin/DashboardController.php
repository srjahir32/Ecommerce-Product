<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;


class DashboardController extends Controller {
   private $user_id;
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function index(){
      // return view('admin.pages.dashboard');

   
      $Bearer_token = session()->get('token');
      $request = Request::create(url('/api/user_details'), 'POST');
      $request->headers->set('Accept', 'application/json');
      $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
      $res = app()->handle($request);
      $response = json_decode($res->getContent());
      $this->user_id = json_decode($res->getContent(),true)['success']['id'];
      // return $this->user_id;
      // return response()->json(['data' =>$response ]);
      return view('admin.pages.dashboard', compact('response'));
     
      
   }

}