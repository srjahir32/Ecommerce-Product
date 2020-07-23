<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Order;

use Mail;



class PendingorderController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');

    }

    public function index(){

        $user_id = session()->get('user')['id']; 

        $data = [

            'user_id' => $user_id,
            'panding_order' => 1

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

        

        return view('admin.pages.pendingorders', compact('orderlist', 'productcategory'));

    }



    public function ordercount(){

        $user_id = session()->get('user')['id']; 

        $totalorder = Order::where([['user_id', $user_id], ['order_status', '0']])->get();

        return response()->json(['data' => $totalorder]);

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

        $approve_order = json_decode($res->getContent(),true); 

        // return $approve_order['status'];

        //get approved order detail

        $request = Request::create(url('/api/order/view'), 'POST', $data);

        $request->headers->set('Accept', 'application/json');

        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);

        $res = app()->handle($request);

        $orderdetail = json_decode($res->getContent(), true); 



        $data = $orderdetail['data'][0];



        if($approve_order['status'] == "1"){

            $to_email = $data['customer_email'];

            $to_name = "Confrim Ecommerce Product";

            $data = array('customer_name' => $data['customer_name'], 'address' => $data['address'], 'city' => $data['city'].' '.$data['zip'], 'country' => $data['country'], 'item' => $data['product_name'], 'quantity' => $data['quantity'], 'currency' => explode('-', $data['currency'])[0], 'price' => $data['price'], 'total' => $data['total']);

    

            Mail::send('email.orderconfirm', $data, function ($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)

                    ->subject('Confrim Ecommerce Product');

                $message->from('payfull@emrahduman.com', 'Confrim Ecommerce Product');

                

            });       

        }

        return response()->json(['data' => $approve_order]);

    }



    public function declineorder($id){

        $data = [

            'order_id' => $id

        ]; 

        $Bearer_token = session()->get('token');

        $request = Request::create(url('/api/order/decline'), 'POST', $data);

        $request->headers->set('Accept', 'application/json');

        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);

        $res = app()->handle($request);

        $approve_order = json_decode($res->getContent()); 

        return response()->json(['data' => $approve_order]);

    }

    public function removeorder($id){

        $data = [

            'order_id' => $id

        ]; 

        $Bearer_token = session()->get('token');

        $request = Request::create(url('/api/order/remove'), 'POST', $data);

        $request->headers->set('Accept', 'application/json');

        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);

        $res = app()->handle($request);

        $remove_order = json_decode($res->getContent()); 

        return response()->json(['data' => $remove_order]);

    }

    

    public function paideorder($id){

        $data = [

            'order_id' => $id

        ]; 

        $Bearer_token = session()->get('token');

        $request = Request::create(url('/api/order/paid'), 'POST', $data);

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

        $customer_email = $orderdetail['data'][0]['customer_email'];
        $user_id = $orderdetail['data'][0]['user_id'];

        $customerorder = Order::join("products", "products.id", "=", "orders.product_id")->select("orders.*", "products.link")->where([['orders.customer_email', $customer_email], ['orders.user_id', $user_id]])->get();

        // return response()->json(['data' => $orderdetail]);

        return response()->json(['data' => ['orderdetail' => $orderdetail, 'customerorder' => $customerorder]]);

    }

}

