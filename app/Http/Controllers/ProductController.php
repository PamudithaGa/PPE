<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Store a new product in the database.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
        }

        // Save product to the database
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $imageName,
        ]);

        // Redirect with success message
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    /**
     * Display the list of products.
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('Admin.ProductDashboard', compact('products'));
    }

        /**
     * Delete a product from the database.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::find($id);

        // Check if product exists
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        // Delete the associated image if it exists
        if ($product->image && file_exists(public_path('img/' . $product->image))) {
            unlink(public_path('img/' . $product->image));
        }

        // Delete the product from the database
        $product->delete();

        // Redirect with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
