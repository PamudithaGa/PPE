<?php

namespace App\Http\Controllers\API;

use App\Models\Tickets;
use App\Models\Event;
use App\Mail\TicketConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TicketsBookingApiController extends Controller
{
    // API to initiate ticket booking and create a Stripe session
    public function create(Request $request)
    {
        Log::info($request->all());
        
        // Validate the form data
        $validated = $request->validate([
            'nic' => 'required|string|max:20',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'event_id' => 'required|exists:events,_id',
            'ticket_quantity' => 'required|integer|min:1',
        ]);

        // Find the event
        $event = Event::findOrFail($validated['event_id']);
        $totalPrice = $event->ticketPrice * $validated['ticket_quantity'];

        // Save ticket details to the database
        $ticket = Tickets::create([
            'user_nic' => $validated['nic'],
            'user_email' => $validated['email'],
            'user_phone' => $validated['phone'],
            'event_id' => $event->_id,
            'ticket_quantity' => $validated['ticket_quantity'],
            'total_price' => $totalPrice,
        ]);

        // Initialize Stripe session
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'lkr',
                        'product_data' => [
                            'name' => $event->eventName,
                        ],
                        'unit_amount' => $event->ticketPrice * 100, // In cents
                    ],
                    'quantity' => $validated['ticket_quantity'],
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('booking.success', ['ticket' => $ticket->id]),
            'cancel_url' => route('booking.cancel'),
        ]);

        return response()->json([
            'success' => true,
            'session_url' => $session->url,
        ], 200);
    }

    // API for success (email confirmation sent after successful payment)
    public function success(Request $request)
    {
        $ticket = Tickets::findOrFail($request->ticket);

        // Send confirmation email
        Mail::to($ticket->user_email)->send(new TicketConfirmationMail($ticket));

        return response()->json([
            'success' => true,
            'message' => 'Payment successful and ticket confirmation email sent.',
        ], 200);
    }

    // API for cancel (when payment is canceled)
    public function cancel()
    {
        return response()->json([
            'success' => false,
            'message' => 'Payment canceled.',
        ], 400);
    }
}
