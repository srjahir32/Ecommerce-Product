<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    public $timestamps = false;
    protected $casts = [
        'variation_option_value' => 'array'
    ];    
}
