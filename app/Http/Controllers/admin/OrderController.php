<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user_id = session()->get('user')['id']; 
        $data = [
            'user_id' => $user_id
        ];        
        $Bearer_token = session()->get('token');
        
        $request = Request::create(url('/api/order'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $orderlist = json_decode($res->getContent(), true);
        
        //get product category        
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);
        
        return view('admin.pages.orders', compact('orderlist', 'productcategory'));
    }
}
