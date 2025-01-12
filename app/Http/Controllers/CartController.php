<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Add a product to the cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,_id', // Validate MongoDB ID
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // If the product is already in the cart, update quantity
            $cartItem->increment('quantity', $request->quantity);
        } else {
            // Add new item to the cart
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart!'], 200);
    }

    // View the cart
    public function viewCart()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('Users.cart', compact('cartItems'));
    }

    // Remove an item from the cart
    public function removeFromCart($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->find($id);

        if (!$cartItem) {
            return redirect()->route('cart.view')->with('error', 'Item not found.');
        }

        $cartItem->delete();

        return redirect()->route('cart.view')->with('success', 'Item removed from cart.');
    }

    public function index()
    {
        // Fetch the authenticated user's cart items
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Pass the cart items to the view
        return view('Users.cart', compact('cartItems'));
    }
}
