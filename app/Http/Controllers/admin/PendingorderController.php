<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class PendingorderController extends Controller
{
    public function index(){
        $user_id = session()->get('user_id'); 
        $data = [
            'user_id' => $user_id
        ];        
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/user_details'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent()); 
    
    $request = Request::create(url('/api/order'), 'POST', $data);
    $request->headers->set('Accept', 'application/json');
    $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
    $res = app()->handle($request);
    $orderlist = json_decode($res->getContent(), true);
    // $orderlist = Order::where('user_id', $user_id)->get();
    // $orderlist = Order::join('product_plug', 'product_plug.product_id', '=', 'orders.product_id')->select('orders.*', 'product_plug.payment_type')->where('orders.user_id', $user_id)->get();
    // return $orderlist;
    return view('admin.pages.pendingorders', compact('response','orderlist'));
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
