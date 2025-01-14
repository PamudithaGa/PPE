<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Users.dashboard');
    }

    public function cart()
    {
        return view('Users.cart'); 
    }
}
