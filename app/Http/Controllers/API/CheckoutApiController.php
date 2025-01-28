<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Mail\OrderConfirmationMail;

class CheckoutApiController extends Controller
{
    public function checkout(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['error' => 'Your cart is empty.'], 400);
        }

        $lineItems = [];
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'lkr',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount'  => $item->product->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
            $subtotal += $item->product->price * $item->quantity;
        }

        $shipping = 2500;
        $total = $subtotal + $shipping;

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('api.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('api.checkout.cancel'),
                'metadata' => [
                    'full_name'   => $request->full_name,
                    'address'     => $request->address,
                    'phone_number'=> $request->phone_number,
                ]
            ]);

            return response()->json(['checkout_url' => $session->url], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Stripe error: ' . $e->getMessage()], 500);
        }
    }
    
    public function success(Request $request)
    {
        $session_id = $request->query('session_id');

        if (!$session_id) {
            return response()->json(['error' => 'Invalid payment session.'], 400);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = Session::retrieve($session_id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment verification failed.'], 400);
        }

        $userId = Auth::id();

        $fullName = $session->metadata->full_name;
        $address = $session->metadata->address;
        $phoneNumber = $session->metadata->phone_number;

        $totalAmount = $session->amount_total / 100; 

        $cartItems = Cart::where('user_id', $userId)->get();
        $items = $cartItems->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ];
        });

        $order = Order::create([
            'user_id' => $userId,
            'full_name' => $fullName,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'total_amount' => $totalAmount,
            'payment_status' => 'Paid',
            'stripe_session_id' => $session_id,
            'items' => $items->toArray(),
        ]);

        Mail::to(Auth::user()->email)->send(new OrderConfirmationMail($order));

        Cart::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Payment successful!', 'order' => $order], 200);
    }

    public function cancel()
    {
        return response()->json(['error' => 'Payment was canceled.'], 400);
    }
}
