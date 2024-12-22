<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Users.dashboard'); // Make sure this corresponds to the view you want to display.
    }

    public function cart()
    {
        return view('Users.cart'); // Make sure this corresponds to the view you want to display.
    }
}
