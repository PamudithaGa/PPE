<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

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

    public function login()
    {
        return view('Admin.AdminLogin'); 
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            $request->session()->regenerate();
            return redirect()->route('products.index'); // Redirect to products dashboard
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    
    }

    

// db.sessions.deleteMany({});