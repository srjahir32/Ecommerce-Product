<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productoption extends Model
{
    protected $table = 'product_options';
    public $timestamps = false;
    protected $casts = [
        'variation_option_value' => 'array'
    ];    
}
