<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\User;
use App\UserBusiness;

class Checkoutlinkcontroller extends Controller
{
    public function productlink($link)
    {
        return redirect('cart/' . $link);
    }

    public function productlinkdata($link)
    {

        $product_id = Product::where('link', $link)->value('id');
        //get product data
        $cartproduct_data = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.id', 'products.product_name', 'products.short_desc', 'products.long_desc', 'products.currency', 'products.price', 'products.user_id', 'products.product_type', 'products.category_id', 'categories.category_name', 'products.order_limit', 'products.stock', 'products.link', 'products.payment_type', 'products.created_at', 'products.updated_at')->where('products.id', $product_id)->get();
        $cartproduct = json_decode($cartproduct_data, true);
        if($cartproduct_data->isEmpty() ){
            return abort(404);
        }
        
        //get product image
        $product_image = ProductImage::where('product_id', $product_id)->get();
        $productimg = json_decode($product_image, true);

        //get user 
        $user_id = $cartproduct[0]['user_id'];
        $user = User::where('id', $user_id)->get();
        $userdata = json_decode($user, true);

        $business = UserBusiness::where('user_id', $user_id)->get();
        $businessdata = json_decode($business, true);

        return view('front.pages.checkout', compact("cartproduct", "productimg", "userdata", "businessdata"));
    }
}
