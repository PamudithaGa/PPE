<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventApiController extends Controller
{
    // Fetch all events
    public function index()
    {
        $events = Event::all();
        return response()->json([
            'success' => true,
            'data' => $events,
        ], 200);
    }

    // Fetch a specific event by ID
    public function show($id)
    {
        $event = Event::find($id);
        if ($event) {
            return response()->json([
                'success' => true,
                'data' => $event,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event not found!',
            ], 404);
        }
    }
}
