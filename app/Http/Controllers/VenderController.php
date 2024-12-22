<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenderController extends Controller
{
    public function dashboard()
    {
        return view('Vender.dashboard');
    }
}
