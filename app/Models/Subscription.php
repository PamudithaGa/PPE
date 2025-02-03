<?php

namespace App\Models;

Use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Subscription extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'subscriptions';
    protected $fillable = [
        
        'user_id', 
        'plan', 
        'stripe_payment_id',
        'expires_at',
    ];
}
