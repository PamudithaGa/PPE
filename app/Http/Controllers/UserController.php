<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class UserController extends Controller
{
    public function index()
    {
        return view('Users.dashboard');
    }
}
