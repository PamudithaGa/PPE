<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MongoDB\Client;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            Cart::create([
                'user_id' => '6784be13229c87a83d0fbc82', // Replace with an actual user ID
                'product_id' => '67836f44c42f84dddf03c36e', // Replace with an actual product ID
                'quantity' => 1,
                //'added_at' => now(),
            ]);

            Cart::create([
                'user_id' => '678ce217a929a6008c025522', // Replace with an actual user ID
                'product_id' => '67836eddc42f84dddf03c36d', // Replace with an actual product ID
                'quantity' => 4,
                //'added_at' => now(),
            ]);
        
        
    }
}
