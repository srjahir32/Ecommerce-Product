<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Order;
use App\User;

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
            'state' => $input['state'],
            'country' => $input['country'],
            'postal_code' => $input['postcode'],
            'email' => $input['email'],
            'phone' => $input['telephone'],
            'timezone' => $input['timezone'],
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
    public function viewbussinesssetting()
    {
        $user_id =  session()->get('user')['id'];
        //view bussiness setting
        $data = [
            'user_id' => $user_id,
        ];
        // return $data;
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/business/view'), 'POST',$data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);   
        return response()->json(['data' => $response]);     

    }
    public function editbussinesssetting(Request $request)
    {
        $input = $request->all();
        $user_id =  session()->get('user')['id'];
        //edit bussiness setting
        $data = [
            'user_id' => $user_id,
            'business_name' => $input['shop_name'],
            'address' => $input['address'],
            'city' => $input['city'],
            'state' => $input['state'],
            'country' => $input['country'],
            'postal_code' => $input['postcode'],
            'email' => $input['email'],
            'phone' => $input['telephone'],
            'timezone' => $input['timezone'],
        ];
        // return $data;
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/business/edit'), 'POST',$data);
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

        $weekrevenue = User::select(
        User::raw("(SELECT COUNT(DISTINCT (orders.customer_email)) FROM orders WHERE orders.user_id = users.id AND orders.created_at >= (DATE(NOW()) - INTERVAL 7 DAY) GROUP BY orders.user_id) as active_customers"),
        User::raw("(SELECT SUM(orders.total) FROM orders WHERE orders.user_id = users.id AND orders.created_at >= (DATE(NOW()) - INTERVAL 7 DAY) AND orders.order_status = 2 GROUP BY orders.user_id) as total_revenue"),
        User::raw("(SELECT SUM(orders.quantity) FROM orders WHERE orders.user_id = users.id AND orders.created_at >= (DATE(NOW()) - INTERVAL 7 DAY) AND orders.order_status != 3 GROUP BY orders.user_id) as products_sold"))
        ->where("users.id", $id)
        ->get();

        $monthrevenue = User::select(
        User::raw("(SELECT COUNT(DISTINCT (orders.customer_email)) FROM orders WHERE orders.user_id = users.id AND MONTH(orders.created_at) = MONTH(CURDATE()) GROUP BY orders.user_id) as active_customers"),
        User::raw("(SELECT SUM(orders.total) FROM orders WHERE orders.user_id = users.id AND MONTH(orders.created_at) = MONTH(CURDATE()) AND orders.order_status = 2 GROUP BY orders.user_id) as total_revenue"),
        User::raw("(SELECT SUM(orders.quantity) FROM orders WHERE orders.user_id = users.id AND MONTH(orders.created_at) = MONTH(CURDATE()) AND orders.order_status != 3 GROUP BY orders.user_id) as products_sold"))
        ->where("users.id", $id)
        ->get();

        // return $monthrevenue;
        
        return response()->json(['data' => ['businessdata' => $businessdata, 'productdata' => $productdata, 'userdata' => $userdata, 'weekrevenue' => $weekrevenue, 'monthrevenue' => $monthrevenue]]);
    }
}
