<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingController extends Controller
{
    public function index()
    {
        return view('weddings/wedding'); // Make sure this corresponds to the view you want to display.
    }

    public function sasiruwan()
    {
        return view('weddings/sasiruwan'); // Make sure this corresponds to the view you want to display.
    }

    public function loshitha()
    {
        return view('weddings/loshitha'); // Make sure this corresponds to the view you want to display.
    }

    public function dulaj()
    {
        return view('weddings/dulaj'); // Make sure this corresponds to the view you want to display.
    }
}
