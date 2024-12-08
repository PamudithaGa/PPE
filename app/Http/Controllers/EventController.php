<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
class EventController extends Controller
{
    public function create()
    {
        return view('event.create'); // Show the event form
    }
    
    public function store(Request $request)
    {
        // Validate the request data
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
        ]);

        // Save the data into MongoDB
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

        // Handle the event image upload
        if ($request->hasFile('eventImage')) {
            $imageName = time() . '_' . $request->file('eventImage')->getClientOriginalName();
            $request->file('eventImage')->move(public_path('img'), $imageName);
            $event->eventImage = $imageName; // Save the image name in the database
        }

        // Save to database
        $event->save();
        // Redirect back with a success message
        return redirect()->route('EventDashboard')->with('success', 'Event Added successfully!');
    }


    public function index()
    {
        $events = Event::all(); // Fetch all events
        return view('Admin.EventDashboard', compact('events')); // Pass events to the view
    }


    public function destroy($id)
    {
        // Find the event by ID
        $event = Event::find($id);

        if ($event) {
            // Remove the event image from the public folder
            $imagePath = public_path('img/' . $event->eventImage);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the event
            $event->delete();

            return redirect()->route('EventDashboard')->with('success', 'Event deleted successfully!');
        }

        return redirect()->route('EventDashboard')->with('error', 'Event not found!');
    }



    public function update(Request $request, $id)
{
    $event = Event::find($id);

    // Validate inputs
    $request->validate([
        'eventName' => 'required',
        'eventType' => 'required',
        'ticketPrice' => 'required|numeric',
        'eventDate' => 'required|date',
        'eventTime' => 'required',
        'endTime' => 'required',
        'eventVenue' => 'required',
        'eventDescription' => 'required',
        'eventImage' => 'nullable|image',
    ]);

    // Update event details
    $event->update($request->all());

    // Handle image upload if present
    if ($request->hasFile('eventImage')) {
        $file = $request->file('eventImage');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $filename);
        $event->eventImage = $filename;
        $event->save();
    }

    return redirect()->back()->with('success', 'Event updated successfully!');
}




}

