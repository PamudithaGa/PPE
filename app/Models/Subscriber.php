<?php

namespace App\Models;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
Use MongoDB\Laravel\Eloquent\Model as Eloquent;


class Subscriber extends Eloquent
{
    protected $connection = 'mongodb'; // Specify MongoDB as the connection
    protected $fillable = ['name', 'email', 'plan', 'stripe_token']; // Fields that can be mass-assigned
}
