<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Productimage;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductContrller extends Controller
{
    private $imagestorename;
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $request = Request::create(url('/api/products'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $products = json_decode($res->getContent(), true);
        return view('admin.pages.products', compact('productcategory', 'products'));
    }
    public function productlist(){
        $user_id =  session()->get('user')['id'];
        $data = [
            'user_id' => $user_id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $products = json_decode($res->getContent(), true);
        return response()->json(['success' => $products]);
    }
    public function saveproductimage(Request $request)
    {
        $image = $request->file('file');
        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $milliseconds = round(microtime(true) * 1000);
        $imagestorename = $filename . "_" . $milliseconds . "." . $extension;
        $image->move(public_path('products/image'), $imagestorename);
        return response()->json(['success' => $imagestorename]);
    }

    public function deleteproductimage($id)
    {
        $data = [
            'image_id' => $id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/removeimage'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);
        return response()->json(['data' => $response]);
    }

    public function saveproduct(Request $request)
    {
        $user_id =  session()->get('user')['id'];
        $input = request()->all();
        
        $product_image = $input['product_image'];
    //  return $product_image;
     if(!empty($product_image)){     
        $product_image_arr = explode(",", $product_image);
    }
    else{
        $product_image_arr = [];
    }
    //   return ;
            
        
        //call product create api
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
            'link' => str::random(8),
            'payment_type' => "Cash",
        ];
// return $data;
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/create'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);

        if ($response['status'] == "0") {
            return response()->json(['data' => $response]);
        }
        $latest_product_id = json_decode($res->getContent(), true)['latest_product_id'];

        // get product detail from last inserted id
        $data = [
            'product_id' => $latest_product_id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent(), true);

        // save product image
        $product_image_data = array();
        foreach ($product_image_arr as $imagename) {
            $product_image_data[] = array('product_id' => $latest_product_id, 'image_path' => $imagename);
        }
        if(count($product_image_arr)>0){
        $insert_product_image = Productimage::insert($product_image_data);
        }
        return response()->json(['data' => $response]);

    }

    public function getproduct($id)
    {
        // get product data
        $data = [
            'product_id' => $id,
        ];
        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/products/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $product_data = json_decode($res->getContent());

        // get product iamge
        $request = Request::create(url('/api/products/viewimage'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $product_image_data = json_decode($res->getContent());

        return response()->json(['data' => ['product' => $product_data, 'productimage' => $product_image_data]]);
    }

    public function editproduct($id)
    {
        $input = request()->all();
        $user_id =  session()->get('user')['id'];
        $product_image = $input['product_image'];
        if(!empty($product_image)){     
            $product_image_arr = explode(",", $product_image);
        }
        else{
            $product_image_arr = [];
        }

        // save product image
        $product_image_data = array();
        foreach ($product_image_arr as $imagename) {
            $product_image_data[] = array('product_id' => $id, 'image_path' => $imagename);
        }
        if(count($product_image_arr)>0){
        $insert_product_image = Productimage::insert($product_image_data);
        }
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
        $id = [
            'product_id' => $id,
        ];

        $request = Request::create(url('/api/products/view'), 'POST', $id);
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
    public function productlink($link){
        return redirect('cart/'.$link);
    }

    public function productlinkdata($link){
        $user_id = session()->get('user')['id'];
        $product_id = Product::where('link', $link)->value('id');
        $Bearer_token = session()->get('token');
        $data = [
            'product_id' => $product_id,
        ];
        $request = Request::create(url('/api/products/view'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $cartproduct = json_decode($res->getContent(), true); 

        $request = Request::create(url('/api/products/viewimage'), 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$Bearer_token);
        $res = app()->handle($request);
        $productimg = json_decode($res->getContent(), true); 
        
        return view('front.pages.checkout', compact("cartproduct",  "productimg"));
    }
}
