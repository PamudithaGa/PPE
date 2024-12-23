<?php

namespace App\Models;

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
