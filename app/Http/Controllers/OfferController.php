<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return view('Users/offerings'); // Make sure this corresponds to the view you want to display.
    }
}
