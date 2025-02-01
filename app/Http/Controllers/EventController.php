<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
class EventController extends Controller
{
    public function create()
    {
        return view('event.create');     }
    
    public function store(Request $request)
    {
        $request->validate([
            'eventName' => 'required|string|max:255',
            'eventType' => 'required|string',
            'ticketPrice' => 'required|numeric',
            'eventDate' => 'required|date',
            'eventTime' => 'nullable|date_format:H:i',
            'endTime' => 'nullable|date_format:H:i',
            'eventVenue' => 'required|string',
            'eventDescription' => 'required|string',
            'artists' => 'nullable|array',
            'eventImage' => 'required|file|mimes:jpg,jpeg,png',
            'ticketQunatity' => 'required|numeric',
        ]);

        $event = new Event();
        $event->eventName = $request->input('eventName');
        $event->eventType = $request->input('eventType');
        $event->ticketPrice = $request->input('ticketPrice');
        $event->eventDate = $request->input('eventDate');
        $event->eventTime = $request->input('eventTime');
        $event->endTime = $request->input('endTime');
        $event->eventVenue = $request->input('eventVenue');
        $event->description = $request->input('eventDescription');
        $event->artists = $request->input('artists') ?: [];
        $event->ticketQuantity = $request->input('ticketQuantity');

        if ($request->hasFile('eventImage')) {
            $imageName = time() . '_' . $request->file('eventImage')->getClientOriginalName();
            $request->file('eventImage')->move(public_path('img'), $imageName);
            $event->eventImage = $imageName;
        }
        $event->save();
        return redirect()->route('EventDashboard')->with('success', 'Event Added successfully!');
    }


    public function index()
    {
        $events = Event::all(); 
        return view('Admin.EventDashboard', compact('events')); 
    }


    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $imagePath = public_path('img/' . $event->eventImage);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $event->delete();
            return redirect()->route('EventDashboard')->with('success', 'Event deleted successfully!');
            
        }
        return redirect()->route('EventDashboard')->with('success', 'Event not found!');
    }


public function update(Request $request, $id)
{
    $event = Event::find($id);

    if (!$event) {
        return redirect()->route('EventDashboard')->with('error', 'Event not found!');
    }

    $request->validate([
        'eventName' => 'required|string|max:255',
        'eventType' => 'required|string',
        'ticketPrice' => 'required|numeric',
        'eventDate' => 'required|date',
        'eventTime' => 'required|date_format:H:i',
        'endTime' => 'nullable|date_format:H:i',
        'eventVenue' => 'required|string',
        'eventDescription' => 'required|string',
        'artists' => 'nullable|array',
        'eventImage' => 'nullable|file|mimes:jpg,jpeg,png',
        'ticketQuantity' => 'required|numeric',
    ]);

    $event->eventName = $request->input('eventName');
    $event->eventType = $request->input('eventType');
    $event->ticketPrice = $request->input('ticketPrice');
    $event->eventDate = $request->input('eventDate');
    $event->eventTime = $request->input('eventTime');
    $event->endTime = $request->input('endTime');
    $event->eventVenue = $request->input('eventVenue');
    $event->description = $request->input('eventDescription');
    $event->artists = $request->input('artists') ?: [];
    $event->ticketQuantity = $request->input('ticketQuantity');

    if ($request->hasFile('eventImage')) {
        // Delete the old image if it exists
        $imagePath = public_path('img/' . $event->eventImage);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $imageName = time() . '_' . $request->file('eventImage')->getClientOriginalName();
        $request->file('eventImage')->move(public_path('img'), $imageName);
        $event->eventImage = $imageName;
    }

    $event->save();

    return redirect()->route('EventDashboard')->with('success', 'Event updated successfully!');
}


}
