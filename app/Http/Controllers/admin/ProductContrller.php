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
        //get user detail
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/user_details'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $userdetail = json_decode($res->getContent());
        $userdata = json_decode($res->getContent(), true);
        if ($userdata) {
            $user_id = $userdata['success']['id'];
            session()->put('user_id', $user_id);
        }

        //get product category
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);

        //get all peoducts

        $request = Request::create(url('/api/products'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $products = json_decode($res->getContent(), true);
        return view('admin.pages.products', compact('userdetail', 'productcategory', 'products'));
    }

    public function saveproduct(Request $request)
    {
        $user_id = session()->get('user_id');
        $input = request()->all();
        $data = [
            'product_name' => $input['title'],
            'short_desc' => $input['short_description'],
            'long_desc' => $input['long_description'],
            'price' => $input['product_price'],
            'stock' => $input['product_stock'],
            'user_id' => $user_id,
            'product_type' => "physiacal",
            'category_id' => $input['category'],
            'order_limit' => $input['order_limit'],
        ];

        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/create'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        $latest_product_id = json_decode($res->getContent(), true)['latest_product_id'];
        // return $latest_product_id;
        $data = [
            'product_id' => $latest_product_id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        // return response()->json(['data' => $response]);
        return response()->json(['data' => $response]);
    }
    public function getproduct($id)
    {
        // return $id;
        $data = [
            'product_id' => $id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        return response()->json(['data' => $response]);
    }
    public function editproduct($id)
    {
        $input = request()->all();
        $user_id = session()->get('user_id');
        $data = [
            'product_id' => $id,
            'product_name' => $input['title'],
            'short_desc' => $input['short_description'],
            'long_desc' => $input['long_description'],
            'price' => $input['product_price'],
            'stock' => $input['product_stock'],
            'user_id' => $user_id,
            'product_type' => "physiacal",
            'category_id' => $input['category'],
            'order_limit' => $input['order_limit'],
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/edit'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        return response()->json(['data' => $response]);
    }
    public function deleteproduct($id)
    {
        $data = [
            'product_id' => $id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/remove'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        return response()->json(['data' => $response]);
    }
}
