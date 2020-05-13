<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Productimage;
use Validator;

class ProductController extends Controller
{
    // 1. view all product
    public function index() {
        $product = Product::all();
        if($product->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$product]);
    }

    // 2. create new product
    public function create(Request $request) {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'product_type' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $insert_product = Product::create($input);
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'insert product successfully.']);
    }

    // 3. view single product
    public function view(Request $request) {
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $view_product = Product::where('id', $product_id)->get();
        if($view_product->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$view_product]);
    }

    // 4. edit product
    public function edit(Request $request) {
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'product_name' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'product_type' => 'required',
            'category_id' => 'required',
        ]);
        $product_name = $request->input('product_name');
        $short_desc = $request->input('short_desc');
        $long_desc = $request->input('long_desc');
        $price = $request->input('price');
        $user_id = $request->input('user_id');
        $product_type = $request->input('product_type');
        $category_id = $request->input('category_id');
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $update_product = Product::where('id', $product_id)->update(['product_name' => $product_name, 'short_desc' => $short_desc, 'long_desc' => $long_desc, 'price' => $price, 'user_id' => $user_id, 'product_type' => $product_type, 'category_id' => $category_id]);
        if ($update_product != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }
    }

    // 5. remove product
    public function remove(Request $request) {
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $delete_product = Product::where('id', $product_id)->delete();
        if ($delete_product != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }
    }

    // 6. store product images
    public function addimage(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'image_path' => 'required',
        ]);
        $product_id = $request->input('product_id');
        $image_path = $request->input('image_path');
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $insert_product_image = Productimage::insert(['product_id' => $product_id, 'image_path' => $image_path]);
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'insert product image successfully.']);
    }

    // 7. view product image
    public function viewimage(Request $request) {
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $view_product_image = Productimage::where('product_id', $product_id)->get();
        if($view_product_image->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$view_product_image]);
    }

    // 8. remove product image
    public function removeimage(Request $request) {
        $image_id = $request->input('image_id');
        $validator = Validator::make($request->all(), [
            'image_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $delete_product_image = Productimage::where('id', $image_id)->delete();
        if ($delete_product_image != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }
    }
}
