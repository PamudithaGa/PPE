<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
class ProductApiController extends Controller
{

    /**
     * API for fetching product offerings grouped by category.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiOfferings()
    {
        $productsByCategory = Product::all()->groupBy('category');

        $formattedData = [];
        foreach ($productsByCategory as $category => $products) {
            $formattedData[] = [
                'category' => $category,
                'products' => $products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'description' => $product->description,
                        'image' => asset('img/' . $product->image),
                        'material' => $product->material,
                        'weight' => $product->weight,
                        'kt' => $product->kt,
                    ];
                })
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $formattedData,
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'image' => asset('img/' . $product->image),
            'material' => $product->material,
            'weight' => $product->weight,
           'kt' => $product->kt,
        ];
    }

}
