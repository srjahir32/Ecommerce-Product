<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Productimage;
use App\Productoption;
use App\Productvariation;
use Validator;

class ProductController extends Controller
{
    // 1. view all product
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        $user_id = $request->input("user_id");
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $product = Product::join('categorys', 'categorys.id', '=', 'products.category_id')->select('products.id', 'products.product_name', 'products.short_desc', 'products.long_desc', 'products.price', 'products.user_id', 'products.product_type', 'products.category_id', 'categorys.category_name', 'products.order_limit', 'products.stock', 'products.created_at', 'products.updated_at')->where('products.user_id', $user_id)->get();
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
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $insert_product = Product::create($input);
        $latest_product_id = $insert_product->id;
        return response()->json(['message'=>'success',  'status'=>'1', 'latest_product_id'=>$latest_product_id, 'data'=>'insert product successfully.']);
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
        $view_product = Product::join('categorys', 'categorys.id', '=', 'products.category_id')->select('products.id', 'products.product_name', 'products.short_desc', 'products.long_desc', 'products.price', 'products.user_id', 'products.product_type', 'products.category_id', 'categorys.category_name', 'products.order_limit', 'products.stock', 'products.created_at', 'products.updated_at')->where('products.id', $product_id)->get();
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
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0',
        ]);
        $product_name = $request->input('product_name');
        $short_desc = $request->input('short_desc');
        $long_desc = $request->input('long_desc');
        $order_limit = $request->input('order_limit');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $user_id = $request->input('user_id');
        $product_type = $request->input('product_type');
        $category_id = $request->input('category_id');
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $update_product = Product::where('id', $product_id)->update(['product_name' => $product_name, 'short_desc' => $short_desc, 'long_desc' => $long_desc, 'order_limit' => $order_limit, 'price' => $price, 'stock' => $stock, 'user_id' => $user_id, 'product_type' => $product_type, 'category_id' => $category_id]);
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

    // 9. add product variation option
    public function addoption(Request $request) {
        $product_id = $request->input('product_id');
        // $validator = Validator::make($request->all(), [
        //     'product_id' => 'required',
        // ]);
       
        $variation_option_name = $request->input('variation_option_name');
        $variation_option_value = $request->input('variation_option_value');
        // if ($validator->fails()) { 
        //     return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        // }
        $insert_variation_option = Productoption::insert($request->all());
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'insert product option successfully.']);
    }

    // 10. view product variation option
    public function viewoption(Request $request) {
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $view_variation_option = Productoption::where('product_id', $product_id)->get();
        if($view_variation_option->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$view_variation_option]);
    }

    // 11. edit product variation option
    public function editoption(Request $request) {
        $option_id = $request->input('option_id');
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'option_id' => 'required'
        ]);
        $variation_option_name = $request->input('variation_option_name');
        $variation_option_value = $request->input('variation_option_value');
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $update_variation_option = Productoption::where([['product_id', $product_id], ['id', $option_id]])->update(['variation_option_name' => $variation_option_name, 'variation_option_value' => $variation_option_value]);
        if ($update_variation_option != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }
    }

    // 12. add product variations
    public function addvariation(Request $request) {
        // $product_id = $request->input('product_id');
        // $product_option_id = $request->input('product_option_id');
        $validator = Validator::make($request->all(), [
            // 'product_id' => 'required',
            // 'product_option_id' => 'required',
            // 'stock' => 'required',
        ]);
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $product_sku = $request->input('product_sku');
        $stock = $request->input('stock');
        $price = $request->input('price');
        $image_path = $request->input('image_path');
            // if ($validator->fails()) { 
            //     return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
            // }
        // $insert_variation = Productvariation::insert(['product_id' => $product_id, 'product_option_id' => $product_option_id, 'option_1' => $option_1, 'option_2' => $option_2, 'product_sku' => $product_sku, 'stock' => $stock, 'price' => $price, 'image_path' => $image_path]);
        $insert_variation = Productvariation::create($request->all());
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>'insert product variation successfully.']);
    }

    // 13. view product variations
    public function viewvariation(Request $request) {
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $view_variation = Productvariation::where('product_id', $product_id)->get();
        if($view_variation->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$view_variation]);
    }

    // 14. edit product variations
    public function editvariation(Request $request) {
        $product_id = $request->input('product_id');
        $variation_id = $request->input('variation_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'variation_id' => 'required',
        ]);
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $product_sku = $request->input('product_sku');
        $stock = $request->input('stock');
        $price = $request->input('price');
        $image_path = $request->input('image_path');
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            
        }
        $update_variation_option = Productvariation::where([['product_id', $product_id], ['id', $variation_id]])->update(['option_1' => $option_1, 'option_2' => $option_2, 'product_sku' => $product_sku, 'stock' => $stock, 'price' => $price, 'image_path' => $image_path]);
        if ($update_variation_option != 1) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1']);
        }
    }

    // 15. view all category
    public function category() {
        $category = category::all();
        if($category->isEmpty()){
            return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
        }
        return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$category]);
    }
}
