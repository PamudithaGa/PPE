<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Token;

class SubscriptionController extends Controller
{
    public function showForm()
    {
        return view('subscription'); // Return the subscription form view
    }

    public function processSubscription(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'plan' => 'required|string',
            'stripeToken' => 'required|string',
        ]);

        // Create a new subscriber record
        $subscriber = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email,
            'plan' => $request->plan,
            'stripe_token' => $request->stripeToken,
        ]);

        // Optionally: Charge the user using Stripe
        Stripe::setApiKey('your-secret-key'); // Use your Stripe Secret Key

        try {
            // Use the Stripe token to create a charge
            $charge = \Stripe\Charge::create([
                'amount' => 10000,  // Example amount in cents (LKR 10000)
                'currency' => 'usd',
                'description' => 'Subscription Plan',
                'source' => $request->stripeToken, // The token we received
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        // Return a success response
        return response()->json(['success' => 'Subscription successful']);
    }
}
