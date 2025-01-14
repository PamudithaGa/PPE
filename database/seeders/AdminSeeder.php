<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin::create([
        //     'name' => 'Pamu',
        //     'email' => 'Pamu@gmail.com',
        //     'password' => bcrypt('password'),
        //     'phone' => '1234567890',
        // ]);

        
            Admin::create([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Change this to a secure password
                'phone' => '1234567890',
            ]);
        
    }
}
