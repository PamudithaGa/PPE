<!-- app\Http\Controllers\CartController.php -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $shipping = 2500;
        $total = $subtotal + $shipping;

        return view('Users.cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function addToCart(Request $request)
    {
        Log::info('Add to Cart request received', $request->all());
    
        $validated = $request->validate([
            'product_id' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);
    
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ]);
    
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }
    
    public function remove($id)
    {
        Cart::where('_id', $id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}


