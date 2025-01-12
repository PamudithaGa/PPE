<?php


namespace App\Models;

use Mongodb\Laravel\Eloquent\Model;

class Cart extends Model
{
    protected $connection = 'mongodb'; // Ensure it's using MongoDB
    protected $collection = 'carts';   // Name of the collection

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
