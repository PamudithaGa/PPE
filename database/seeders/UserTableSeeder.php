<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'AdminPamu',
            'email' => 'adminPamu@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'ANANTARA',
            'email' => 'anantaara@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'vendor'
        ]);

        User::create([
            'name' => 'Kavinda',
            'email' => 'kavinda@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);
    }
}
