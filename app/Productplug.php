<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productplug extends Model
{
    protected $table = 'product_plug';
    protected $fillable = [
        'code', 'product_id','product_name', 'payment_type'
    ];
}
