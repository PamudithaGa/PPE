<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
        } else {
            $imagePath = null;
        }

        // Save the product data to MongoDB
        $Product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('ProductDashboard')->with('success', 'Product added successfully!');
    }

    public function index()
    {
        // Fetch all products from the MongoDB "products" collection
        $products = Product::all();
        
        // Pass the products to the view
        return view('Admin.ProductDashboard', compact('$Product'));
    }

    
    

}
