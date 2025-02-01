<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Users.home');
    }

    public function serivces(){
        return view('Users.services'); 
    }

    public function subscribe(){
        return view('Users.subscribe'); 
    }

    public function eventPage()
    {
        $events = Event::all(); 
        return view('Users.events', compact('events')); 
    }
    
}
