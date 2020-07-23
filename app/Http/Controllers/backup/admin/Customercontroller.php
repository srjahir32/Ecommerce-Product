<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Customercontroller extends Controller
{
    public function index()
    {
        
        $Bearer_token = session()->get('token');
        //get product category
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);

        //get all peoducts
        $user_id = session()->get('user')['id'];

        $data = [
            'user_id' => $user_id,
        ];
        $request = Request::create(url('/api/customer'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $customers = json_decode($res->getContent(), true);
        return view('admin.pages.customer', compact('productcategory', 'customers'));
    }
    public function getserachcustomer(Request $request){
        $input = $request->all();
        
        $serach = $input['search'];
        $data = [
            'user_id' => session()->get('user')['id'],
            'keyword' => $serach
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/customer/search'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);
        return response()->json(['data' => $response]);
    }
}
