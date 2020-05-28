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
        // return view('admin.pages.dashboard');
        //get product category
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);
     
        return view('admin.pages.dashboard', compact('productcategory'));
       

    }
    
}
