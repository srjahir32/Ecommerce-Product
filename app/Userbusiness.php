<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBusiness extends Model
{
    // protected $table = 'user_business';
    protected $fillable = [
        'user_id', 'business_name', 'address', 'city', 'state', 'country', 'postal_code', 'email', 'phone', 'timezone',
    ];
}
