<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductContrller extends Controller
{
    private $userid;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/user_details'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        $this->userid = json_decode($res->getContent(), true)['success']['id'];
        // return ($this->userid);
        return view('admin.pages.products', compact('response'));
    }
    public function saveproduct(Request $request)
    {
        $input = request()->all();
        // return $input['short_description'];
        $data = [
            'product_name' => $input['title'],
            'short_desc' => $input['short_description'],
            'long_desc' => $input['long_description'],
            'price' => $input['product_price'],
            'stock' => $input['product_stock'],
            'user_id' => $this->userid,
            'product_type' => "physiacal",
            'category_id' => "5",
            'order_limit' => $input['order_limit'],
        ];
        //  $data = [
        //     'product_name' => "test product1",
        //     'short_desc' => "product short desc",
        //     'long_desc' => 'product long desc',
        //     'price' => '100',
        //     'stock' => '12',
        //     'user_id' => "11",
        //     'product_type' => "physiacal",
        //     'category_id' => "1",
        //     'order_limit' => '2'
        // ];

        $Bearer_token = session()->get('token');
        $request = Request::create('/api/products/create', 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        return response()->json(['data' => $response]);
        // return view('admin.pages.dashboard', compact('response'));
    }
}
