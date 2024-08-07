<?php

namespace App\Http\Controllers;

use App\Models\SimilarProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class SimilarProductController extends Controller
{
    public function index($productId)
    {
        $product = Product::with('similarProducts')->findOrFail($productId);
        return response()->json($product->similarProducts);
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'similar_product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($productId);
        $similarProduct = Product::findOrFail($request->similar_product_id);

        $product->similarProducts()->attach($similarProduct);

        return response()->json(['message' => 'Similar product added successfully'], 201);
    }

    public function destroy($productId, $similarProductId)
    {
        $product = Product::findOrFail($productId);
        $similarProduct = Product::findOrFail($similarProductId);

        $product->similarProducts()->detach($similarProduct);

        return response()->json(['message' => 'Similar product removed successfully'], 204);
    }
}
