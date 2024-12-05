<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'products';

    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'image',
    ];
}
