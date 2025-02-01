<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Exception\ApiErrorException;
use App\Models\Subscription as SubscriptionModel;
use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $existingSubscription = SubscriptionModel::where('user_id', Auth::id())
            ->where('expires_at', '>', now())
            ->first();

        if ($existingSubscription) {
            return response()->json([
                'error' => 'You already have an active subscription.',
            ], 400);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $customer = Customer::create([
                'email' => $request->email,
                'name' => $request->name,
                'payment_method' => $request->paymentMethod,
                'invoice_settings' => ['default_payment_method' => $request->paymentMethod],
            ]);

            $stripeSubscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [['price' => 'price_1QinOnGPbAuZxiJfB4c6HEOl']],
            ]);

            $subscription = SubscriptionModel::create([
                'user_id' => Auth::id(),
                'plan' => $request->plan,
                'stripe_payment_id' => $stripeSubscription->id,
                'expires_at' => now()->addYear(),
            ]);

            Mail::to($request->email)->send(new SubscriptionMail($subscription));

            return response()->json([
                'message' => 'Subscription successful! A confirmation email has been sent.',
                'subscription' => $subscription,
            ]);
        } catch (ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
