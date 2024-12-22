<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Store a new product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName); // Save image to public/img folder
        } else {
            $imageName = null; // Fallback in case no image is uploaded
        }

        // Save the product data to the database
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $imageName, // Save the image name in the database
        ]);

        // Redirect to the Product Dashboard with success message
        return redirect()->route('ProductDashboard')->with('success', 'Product added successfully!');
    }

    /**
     * Display the list of products on the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('Admin.ProductDashboard', compact('products'));

    }



}

