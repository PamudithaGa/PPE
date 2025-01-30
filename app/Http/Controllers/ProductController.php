<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'material' => 'nullable|string',   
            'weight' => 'nullable|numeric',    
            'kt' => 'nullable|string',     
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
        }

        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'material' => $request->input('category') === 'Jewelry' ? $request->input('material') : null,
            'weight' => $request->input('category') === 'Jewelry' ? $request->input('weight') : null,
            'kt' => $request->input('category') === 'Jewelry' ? $request->input('kt') : null,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    public function index()
    {
        $products = Product::all();
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
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
        if ($product->image && file_exists(public_path('img/' . $product->image))) {
            unlink(public_path('img/' . $product->image));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) 
        {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        return response()->json($product);
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category' => 'required|in:electronics,clothing,jewelry',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update product details
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'] ?? $product->description;
        $product->category = $validatedData['category'];
    
        // Handle jewelry-specific attributes
        if ($request->category === 'jewelry') {
            $validatedJewelryData = $request->validate([
                'material' => 'required|string|max:255',
                'weight' => 'required|numeric|min:0',
                'kt' => 'nullable|string|max:10',
            ]);
    
            $product->material = $validatedJewelryData['material'];
            $product->weight = $validatedJewelryData['weight'];
            $product->kt = $validatedJewelryData['kt'] ?? null;
        }
    
        // Handle image update (if a new image is uploaded)
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::delete($product->image);
            }
    
            // Store new image and update path
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
    
        // Save updates
        $product->save();
    
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    

    public function offerings()
    {
        $productsByCategory = Product::all()->groupBy('category');
        return view('Users.offerings', compact('productsByCategory'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
        return response()->json($product);
    }

}
