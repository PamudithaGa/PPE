<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingController extends Controller
{
    public function index()
    {
        return view('weddings/wedding'); 
    }

    public function sasiruwan()
    {
        return view('weddings/sasiruwan'); 
    }

    public function loshitha()
    {
        return view('weddings/loshitha'); 
    }

    public function dulaj()
    {
        return view('weddings/dulaj');
    }
}
