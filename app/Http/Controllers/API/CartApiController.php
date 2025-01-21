<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Http\Controllers\Controller;

class CartApiController extends Controller
{
    // Get cart items for the authenticated user
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $shipping = 2500;
        $total = $subtotal + $shipping;

        return response()->json([
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total
        ], 200);
    }

    // Add item to cart
    public function addToCart(Request $request)
    {
        Log::info('Add to Cart request received', $request->all());

        $validated = $request->validate([
            'product_id' => 'required|string|exists:products,_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $validated['product_id'],
            ],
            [
                'quantity' => $validated['quantity'],
            ]
        );

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cartItem' => $cartItem
        ], 201);
    }

    // Remove item from cart
    public function remove($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('_id', $id)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart'], 200);
    }
}
