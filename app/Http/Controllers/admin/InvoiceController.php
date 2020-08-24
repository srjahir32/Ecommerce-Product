<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function invoices() {

        $Bearer_token = session()->get('token');

        //get product category
        $request = Request::create(url('/api/products/category'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $productcategory = json_decode($res->getContent(), true);   
        
        $user_id = session()->get('user')['id'];
       
        $data = [
            'user_id' => $user_id,
            'order_status' => 0,
        ]; 
    
        $request = Request::create(url('/api/order'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $pendingorderlist = json_decode($res->getContent(), true);

        $data = [
            'user_id' => $user_id,
        ]; 
    
        $request = Request::create(url('/api/order'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $allorderlist = json_decode($res->getContent(), true);

        $invoicerevenue = User::select(
            User::raw("(SELECT COUNT(DISTINCT (orders.customer_email)) FROM orders WHERE orders.user_id = users.id GROUP BY orders.user_id) as total_customers"),
            User::raw("(SELECT SUM(orders.total) FROM orders WHERE orders.user_id = users.id AND orders.order_status = 2 GROUP BY orders.user_id) as total_revenue"),
            User::raw("(SELECT ROUND(AVG(orders.total), 2) FROM orders WHERE orders.user_id = users.id AND orders.order_status = 2 GROUP BY orders.user_id) as average_total_revenue"),
            User::raw("(SELECT SUM(orders.quantity) FROM orders WHERE orders.user_id = users.id AND orders.order_status = 2 GROUP BY orders.user_id) as products_sold"),
            User::raw("(SELECT ROUND(AVG(orders.quantity), 1) FROM orders WHERE orders.user_id = users.id AND orders.order_status = 2 GROUP BY orders.user_id) as average_products_sold"))
            ->where("users.id", $user_id)
            ->get();
        $invoicerevenue = json_decode($invoicerevenue, true);

        return view('admin.pages.invoices', compact('productcategory', 'pendingorderlist', 'allorderlist', 'invoicerevenue'));
    }

    public function index(Request $request) {
        $user_id = session()->get('user')['id'];
        if ($request->is('paidinvoices')) {
            $data = [
                'user_id' => $user_id,
                'order_status' => 2,
            ]; 
        } elseif($request->is('unpaidinvoices')) {
            $data = [
                'user_id' => $user_id,
                'order_status' => 0,
            ]; 
        } else {
            $data = [
                'user_id' => $user_id,
            ]; 
        }
       
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
        
        return view('admin.pages.ordersinvoices', compact('orderlist', 'productcategory'));
    }

    public function paidinvoiceslict() {
        $user_id = session()->get('user')['id'];       
        $Bearer_token = session()->get('token');

        $data = [
            'user_id' => $user_id,
            'order_status' => 2,
        ]; 
        
        $request = Request::create(url('/api/order'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $totalpaidinvoices = json_decode($res->getContent(), true);
        
        return response()->json(['totalpaidinvoices' => $totalpaidinvoices]);
    }
}
