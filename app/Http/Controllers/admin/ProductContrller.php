<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productoption;
use App\Productvariation;
class ProductContrller extends Controller
{
    private $imagestorename;
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

    public function saveproductimage(Request $request)
    {

        $product_image_arr = [];
        $image = $request->file('file');
        $imagename = $image->getClientOriginalName();
        $imageFileType = $image->getClientOriginalExtension();
        $milliseconds = round(microtime(true) * 1000);
        $imagestorename = $milliseconds . "." . $imageFileType;
        array_push($product_image_arr, $imagestorename);
        session()->push('product_image', $product_image_arr);

        $image->move(public_path('products/image'), $imagestorename);
        return response()->json(['success' => $imagestorename]);

    }

    public function saveproduct(Request $request)
    {
        // $product_image_arr = [];
        $product_image_data = session()->get('product_image');

        // array_push($product_image_arr, $product_image);

        $user_id = session()->get('user_id');
        $input = request()->all();
        
        $option1 = $input['option1'];    
        $variation_one = $input['variation_one'];
        $variation_one_arr = explode(",", $variation_one);
        $option2 = $input['option2'];
        $variation_two = $input['variation_two'];
        $variation_two_arr = explode(",", $variation_two);

        $latest_product_id = "5";
        if ((!empty($input['option1'])) && (!empty($input['variation_one']))) {
            $option_variation_one = array('product_id' => $latest_product_id, 'variation_option_name' => $option1, 'variation_option_value' => json_encode($variation_one_arr));
        }
        else{
            $option_variation_one= array();
        }
        if ((!empty($input['option2'])) && (!empty($input['variation_two']))) {
            $option_variation_two = array('product_id' => $latest_product_id, 'variation_option_name' => $option2, 'variation_option_value' => json_encode($variation_two_arr));
        }
        else{
            $option_variation_two = array();
        }
        $option_variation_data = array(
            $option_variation_one,
            $option_variation_two
        );
        $option_variation_data = array_filter(array_map('array_filter', $option_variation_data));
        
        
        // $Bearer_token = session()->get('token');
        // $request = Request::create(url('/api/products/addoption'), 'POST', $option_variation_data);
        // $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        // $res = app()->handle($request);
        // $response = json_decode($res->getContent());
        // return response()->json(['data' => $response]);

        $combination_variation = array();

        foreach ($variation_one_arr as $key1) {
            foreach ($variation_two_arr as $key2) {
                $combination_variation[] =   array('product_id'=>'5', 'option_1'=> $key1, 'option_2'=> $key2, 'stock' => '12', 'price' => '120', 'image_path' => 'image_path' );
            }
        }
        return(($combination_variation));

        
        $insert_variation = Productvariation::insert($combination_variation);
        return $insert_variation;
        
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

        // $latest_product_id = json_decode($res->getContent(), true)['latest_product_id'];
        // $data = [
        //     'product_id' => $latest_product_id,
        // ];
        // $Bearer_token = session()->get('token');
        // $request = Request::create(url('/api/products/view'), 'POST', $data);
        // $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        // $res = app()->handle($request);
        // $response = json_decode($res->getContent());

       

        return response()->json(['data' => $response]);
    }

    public function getproduct($id)
    {
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

}
