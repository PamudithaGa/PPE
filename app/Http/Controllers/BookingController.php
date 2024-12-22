<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookings;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class BookingController extends Controller
{
    public function index()
    {
        return view('Users.bookings'); // Make sure this corresponds to the view you want to display.
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'eventType' => 'required|string',
            'eventDate' => 'required|date',
            'eventTime' => 'required',
            'location' => 'required|string|max:255',
            'guestCount' => 'required|integer|min:1',
            'theme' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'services' => 'nullable|array',
            'services.*' => 'string',
            'notes' => 'nullable|string|max:1000',
        ]);
    
        // Save the data to MongoDB
        $booking = bookings::create($request->all());
    
        // Send the confirmation email
        Mail::to($request->email)->send(new BookingConfirmation($booking));
    
        // Redirect with a success message
        return redirect()->route('home')->with('success', 'Your booking has been submitted successfully, and a confirmation email has been sent!');
    }
}
