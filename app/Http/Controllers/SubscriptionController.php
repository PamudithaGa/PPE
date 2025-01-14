<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'paymentMethod' => 'required|string',
            'plan' => 'required|string',
        ]);

        try {
            // Initialize Stripe
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            // Attach payment method to the customer
            $user = Auth::user();
            $customer = $stripe->customers->create([
                'email' => $user->email,
                'name' => $user->name,
                'payment_method' => $request->paymentMethod,
                'invoice_settings' => [
                    'default_payment_method' => $request->paymentMethod,
                ],
            ]);

            // Create a subscription
            $stripe->subscriptions->create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => $this->getStripePlanPriceId($request->plan)], // Replace with actual plan ID
                ],
                'expand' => ['latest_invoice.payment_intent'],
            ]);

            // Save subscription in the database
            Subscription::create([
                'user_id' => $user->id,
                'plan' => $request->plan,
                'stripe_customer_id' => $customer->id,
            ]);

            return response()->json(['message' => 'Subscription successful!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Map the plan name to a Stripe price ID.
     */
    private function getStripePlanPriceId($plan)
    {
        $plans = [
            'basic' => 'evt_1QV3b2GPbAuZxiJfuqfwBgHt', // Replace with actual price IDs from Stripe
        ];

        return $plans[$plan] ?? null;
    }
}
