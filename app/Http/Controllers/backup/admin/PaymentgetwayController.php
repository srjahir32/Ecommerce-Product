<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentgetwayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        //get product category
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true); 
        return view('admin.pages.paymentgetway', compact('productcategory'));       
    }
    public function savemerchant(Request $request){
        $input = $request->all();
        $user_id =  session()->get('user')['id'];
        $data = [
            'user_id' => $user_id,
            'merchant_name' => $input['merchant_name'],
            'merchant_password' => $input['merchant_password'],
            
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/addpayment'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true); 
        return response()->json(['success' => $response]);
    }
}
