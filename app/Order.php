<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'order_details',
    ];

    protected $casts = [        
        'order_details' => 'array'
    ];
}
