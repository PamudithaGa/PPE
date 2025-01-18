<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('Users.orders', compact('orders'));
    }

    
        public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Get cart items
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'total_amount' => $request->total_amount,
            'payment_status' => 'pending',
            'stripe_session_id' => null, // Will update after Stripe payment
            'items' => $cartItems->map(function ($cartItem) {
                return [
                    'product_id' => $cartItem->product_id,
                    'name' => $cartItem->product->name,
                    'price' => $cartItem->product->price,
                    'quantity' => $cartItem->quantity,
                ];
            })->toArray(),
        ]);

        // Clear the user's cart after order placement
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}


