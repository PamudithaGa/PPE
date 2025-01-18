<?php

namespace App\Models;

use Mongodb\Laravel\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';

    protected $fillable = [
        'user_id', 'full_name', 'address', 'phone_number', 
        'total_amount', 'payment_status', 'stripe_session_id', 'items'
    ];
}

