<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'customer_name', 'customer_email', 'customer_mobile','address', 'city', 'state', 'zip', 'country', 'product_name', 'currency', 'price', 'quantity', 'total', 'payment_type', 'card_number', 'card_cvc', 'card_expiry', 'card_name',
    ];
}
