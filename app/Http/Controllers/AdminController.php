<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.ProductDashboard');
    }

    public function events()
    {
        return view('Admin.EventDashboard'); 
    }
}

// db.sessions.deleteMany({});