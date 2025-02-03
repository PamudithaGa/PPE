<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Tickets;
use App\Models\Event;
use App\Mail\TicketConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Log;

class TicketsBookingController extends Controller
{
    public function create(Request $request)
    {
        Log::info($request->all());
    
        $validated = $request->validate([
            'nic' => 'required|string|max:20',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'event_id' => 'required|exists:events,_id',
            'ticket_quantity' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($validated['event_id']);
        $totalPrice = $event->ticketPrice * $validated['ticket_quantity'];

        $ticket = Tickets::create([
            'user_nic' => $validated['nic'],
            'user_email' => $validated['email'],
            'user_phone' => $validated['phone'],
            'event_id' => $event->_id,
            'ticket_quantity' => $validated['ticket_quantity'],
            'total_price' => $totalPrice,
        ]);

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
                        'unit_amount' => $event->ticketPrice * 100,
                    ],
                    'quantity' => $validated['ticket_quantity'],
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('booking.success', ['ticket' => $ticket->id]),
            'cancel_url' => route('booking.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $ticket = Tickets::findOrFail($request->ticket);
        Mail::to($ticket->user_email)->send(new TicketConfirmationMail($ticket));
        return redirect()->route('eventPage');
    }

    public function cancel()
    {
        return redirect()->route('eventPage');
    }
}