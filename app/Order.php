<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'customer_name', 'customer_email', 'address', 'city', 'state', 'zip', 'country', 'product_name', 'price', 'quantity', 'total',
    ];
}
