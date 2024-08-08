<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class SimilarProductWebController extends Controller
{
    public function index($productId)
    {
        $product = Product::with('similarProducts')->findOrFail($productId);
        $allProducts = Product::where('id', '!=', $productId)->get();

        return view('similar_products.index', compact('product', 'allProducts'));
    }

    // إضافة منتج مشابه
    public function store(Request $request, $productId)
    {
        $request->validate([
            'similar_product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($productId);
        $product->similarProducts()->attach($request->similar_product_id);

        return redirect()->route('similarProducts.index', $productId)
            ->with('success', 'تم إضافة المنتج المشابه بنجاح.');
    }

    // إزالة منتج مشابه
    public function destroy($productId, $similarProductId)
    {
        $product = Product::findOrFail($productId);
        $product->similarProducts()->detach($similarProductId);

        return redirect()->route('similarProducts.index', $productId)
            ->with('success', 'تم إزالة المنتج المشابه بنجاح.');
    }


}
