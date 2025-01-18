<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Cart;
// use App\Models\Order;
// use Stripe\Stripe;
// use Stripe\Checkout\Session;
// use MongoDB\Client;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\OrderConfirmationMail;

// class CheckoutController extends Controller
// {
//     public function checkout(Request $request)
//     {
//         $userId = Auth::id();
//         $cartItems = Cart::where('user_id', $userId)->get();

//         if ($cartItems->isEmpty()) {
//             return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
//         }

//         $lineItems = [];
//         $subtotal = 0;

//         foreach ($cartItems as $item) {
//             $lineItems[] = [
//                 'price_data' => [
//                     'currency'     => 'lkr',
//                     'product_data' => [
//                         'name' => $item->product->name,
//                     ],
//                     'unit_amount'  => $item->product->price * 100,
//                 ],
//                 'quantity' => $item->quantity,
//             ];
//             $subtotal += $item->product->price * $item->quantity;
//         }

//         $shipping = 2500;
//         $total = $subtotal + $shipping;

//         Stripe::setApiKey(config('services.stripe.secret'));

//         $session = Session::create([
//             'payment_method_types' => ['card'],
//             'line_items' => $lineItems,
//             'mode' => 'payment',
//             'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
//             'cancel_url' => route('checkout.cancel'),
//         ]);

//         return redirect($session->url);
//     }
    
//     public function success(Request $request)
//     {
//         $session_id = $request->query('session_id');
    
//         if (!$session_id) {
//             return redirect()->route('cart.index')->with('error', 'Invalid payment session.');
//         }
    
//         Stripe::setApiKey(config('services.stripe.secret'));
//         $session = Session::retrieve($session_id);
    
//         if (!$session) {
//             return redirect()->route('cart.index')->with('error', 'Payment verification failed.');
//         }
    
//         $userId = Auth::id();
    
//         // Retrieve metadata
//         $fullName = $session->metadata->full_name;
//         $address = $session->metadata->address;
//         $phoneNumber = $session->metadata->phone_number;
    
//         // Calculate total amount
//         $totalAmount = $session->amount_total / 100; 
    
//         // Retrieve cart items
//         $cartItems = Cart::where('user_id', $userId)->get();
//         $items = $cartItems->map(function ($item) {
//             return [
//                 'product_id' => $item->product_id,
//                 'name' => $item->product->name,
//                 'price' => $item->product->price,
//                 'quantity' => $item->quantity,
//             ];
//         });
    
//         // Store order in MongoDB
//         $order = Order::create([
//             'user_id' => $userId,
//             'full_name' => $fullName,
//             'address' => $address,
//             'phone_number' => $phoneNumber,
//             'total_amount' => $totalAmount,
//             'payment_status' => 'Paid',
//             'stripe_session_id' => $session_id,
//             'items' => $items->toArray(),
//         ]);
    
//         // Send confirmation email
//         Mail::to(Auth::user()->email)->send(new OrderConfirmationMail($order));
    
//         // Clear the cart
//         Cart::where('user_id', $userId)->delete();
    
//         return view('Users.success', ['order' => $order]);
//     }
    

//     public function cancel()
//     {
//         return redirect()->route('cart.index')->with('error', 'Payment was canceled.');
//     }

    
// }







// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Cart;
// use Stripe\Stripe;
// use Stripe\Checkout\Session;
// use MongoDB\Client;

// class CheckoutController extends Controller
// {
//     public function checkout(Request $request)
//     {
//         $request->validate([
//             'full_name' => 'required|string',
//             'address' => 'required|string',
//             'phone_number' => 'required|string',
//         ]);
    
//         $userId = Auth::id();
//         $cartItems = Cart::where('user_id', $userId)->get();
    
//         if ($cartItems->isEmpty()) {
//             return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
//         }
    
//         $lineItems = [];
//         foreach ($cartItems as $item) {
//             $lineItems[] = [
//                 'price_data' => [
//                     'currency'     => 'lkr',
//                     'product_data' => [
//                         'name' => $item->product->name,
//                     ],
//                     'unit_amount'  => $item->product->price * 100,
//                 ],
//                 'quantity' => $item->quantity,
//             ];
//         }
    
//         Stripe::setApiKey(config('services.stripe.secret'));
    
//         $session = \Stripe\Checkout\Session::create([
//             'payment_method_types' => ['card'],
//             'line_items' => $lineItems,
//             'mode' => 'payment',
//             'customer_email' => Auth::user()->email,
//             'metadata' => [
//                 'full_name' => $request->full_name,
//                 'address' => $request->address,
//                 'phone_number' => $request->phone_number,
//             ],
//             'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
//             'cancel_url' => route('checkout.cancel'),
//         ]);
    
//         return redirect($session->url);
//     }
    

//     public function success(Request $request)
//     {
//         return view('Users.success');
//     }

//     public function cancel()
//     {
//         return redirect()->route('cart.index')->with('error', 'Payment was canceled.');
//     }
// }



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use MongoDB\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
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

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }
    
    public function success(Request $request)
    {
        $session_id = $request->query('session_id');
    
        if (!$session_id) {
            return redirect()->route('cart.index')->with('error', 'Invalid payment session.');
        }
    
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::retrieve($session_id);
    
        if (!$session) {
            return redirect()->route('cart.index')->with('error', 'Payment verification failed.');
        }
    
        $userId = Auth::id();
    
        // Retrieve metadata
        $fullName = $session->metadata->full_name;
        $address = $session->metadata->address;
        $phoneNumber = $session->metadata->phone_number;
    
        // Calculate total amount
        $totalAmount = $session->amount_total / 100; 
    
        // Retrieve cart items
        $cartItems = Cart::where('user_id', $userId)->get();
        $items = $cartItems->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ];
        });
    
        // Store order in MongoDB
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
    
        // Send confirmation email
        Mail::to(Auth::user()->email)->send(new OrderConfirmationMail($order));
    
        // Clear the cart
        Cart::where('user_id', $userId)->delete();
    
        return view('Users.success', ['order' => $order]);
    }
    

    public function cancel()
    {
        return redirect()->route('cart.index')->with('error', 'Payment was canceled.');
    }
}
