<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class DashboardController extends Controller
{
    private $user_id;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //get product category
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);  
        
        
        return view('admin.pages.dashboard', compact('productcategory'));       

    }

    public function savebussinesssetting(Request $request)
    {
        $input = $request->all();
        $user_id =  session()->get('user')['id'];
        //save bussiness setting
        $data = [
            'user_id' => $user_id,
            'business_name' => $input['shop_name'],
            'address' => $input['address'],
            'city' => $input['city'],
            'country' => $input['country'],
            'postal_code' => $input['postcode'],
            'email' => $input['email'],
            'phone' => $input['telephone'],
        ];
        // return $data;
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/business/create'), 'POST',$data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);   
        return response()->json(['data' => $response]);     

    }
    public function getdashboarddata($id)
    {
        $data = [
            'user_id' => $id,
        ];

        //get bussiness setting details
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/business/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $businessdata = json_decode($res->getContent(), true);

        //get pay full account details
        $request = Request::create(url('/api/products'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productdata = json_decode($res->getContent(), true);

        //get product details
        $request = Request::create(url('/api/user_details'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $userdata = json_decode($res->getContent(), true);
        
        return response()->json(['data' => ['businessdata' => $businessdata, 'productdata' => $productdata, 'userdata' => $userdata]]);
    }
}
