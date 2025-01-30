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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone' => 'required|string|max:15',
    //         'eventType' => 'required|string',
    //         'eventDate' => 'required|date',
    //         'eventTime' => 'required',
    //         'location' => 'required|string|max:255',
    //         'guestCount' => 'required|integer|min:1',
    //         'theme' => 'nullable|string|max:255',
    //         'budget' => 'nullable|numeric',
    //         'services' => 'nullable|array',
    //         'services.*' => 'string',
    //         'notes' => 'nullable|string|max:1000',
    //     ]);
    
    //     $booking = bookings::create($request->all());
    
    //     Mail::to($request->email)->send(new BookingConfirmation($booking));
    
    //     return redirect()->route('home')->with('success', 'Your booking has been submitted successfully, and a confirmation email has been sent!');
    // }

    public function store(Request $request)
{
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
        //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);


    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('img'), $imageName);
    }

    $booking = new bookings();
    $booking->name = $request->name;
    $booking->email = $request->email;
    $booking->phone = $request->phone;
    $booking->eventType = $request->eventType;
    $booking->eventDate = $request->eventDate;
    $booking->eventTime = $request->eventTime;
    $booking->location = $request->location;
    $booking->guestCount = $request->guestCount;
    $booking->theme = $request->theme;
    $booking->budget = $request->budget;
    $booking->services = $request->services;
    $booking->notes = $request->notes;
    //$booking->image = $imageName ? 'img/' . $imageName : null;    $booking->save();

    Mail::to($request->email)->send(new BookingConfirmation($booking));

    return redirect()->route('home')->with('success', 'Your booking has been submitted successfully, and a confirmation email has been sent!');
}

}
