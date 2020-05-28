<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class PendingorderController extends Controller
{
    public function index(){
        $user_id = session()->get('user')['id']; 
        $data = [
            'user_id' => $user_id
        ];        
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/user_details'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(),true);
    
        $request = Request::create(url('/api/order'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $orderlist = json_decode($res->getContent(), true);
        //get product category
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);
        
        return view('admin.pages.pendingorders', compact('response','orderlist', 'productcategory'));
    }

    public function ordercount(){
        $user_id = session()->get('user')['id']; 
        $data = [
            'user_id' => $user_id
        ];  
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/order'), 'POST',$data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $totalorder = json_decode($res->getContent(), true);
        return response()->json(['data' => $totalorder]);
    }
    public function approveorder($id){
        $data = [
            'order_id' => $id
        ]; 
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/order/approve'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $approve_order = json_decode($res->getContent()); 
        return response()->json(['data' => $approve_order]);
    }

    public function declineorder($id){
        $data = [
            'order_id' => $id
        ]; 
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/order/remove'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $approve_order = json_decode($res->getContent()); 
        return response()->json(['data' => $approve_order]);
    }
    
    public function getorderdetail($id){
       
        $Bearer_token = session()->get('token');
        $data = [
            'order_id' => $id,
        ];
        $request = Request::create(url('/api/order/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $orderdetail = json_decode($res->getContent(), true); 
        return response()->json(['data' => $orderdetail]);
    }
}
