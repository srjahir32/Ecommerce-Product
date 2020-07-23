<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'short_desc', 'long_desc', 'currency', 'price', 'user_id', 'product_type', 'category_id', 'order_limit', 'stock', 'link', 'payment_type',
    ];
}