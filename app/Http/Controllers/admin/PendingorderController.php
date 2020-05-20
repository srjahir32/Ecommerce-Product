<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingorderController extends Controller
{
    public function index(){
            
    $Bearer_token = session()->get('token');
    $request = Request::create(url('/api/user_details'), 'POST');
    $request->headers->set('Accept', 'application/json');
    $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
    $res = app()->handle($request);
    $response = json_decode($res->getContent()); 
    // return response()->json(['data' =>$response ]);
    return view('admin.pages.pendingorders', compact('response'));
    }
}
