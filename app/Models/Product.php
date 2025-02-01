<?php

namespace App\Models;

Use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $primaryKey = '_id';
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'image',
        'material', 
        'weight',   
        'kt',   
    ];


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}


