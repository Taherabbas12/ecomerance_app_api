<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryWebController extends Controller
{
    // عرض الفئات الجذرية فقط
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get(); // استرجاع الفئات الجذرية فقط
        return view('categories.index', compact('categories'));
    }

    // عرض التفاصيل عند النقر على الفئة
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $id)->get(); // استرجاع الفروع
        $products = Product::where('category_id', $id)->get(); // استرجاع المنتجات

        return view('categories.show', compact('category', 'subCategories', 'products'));
    }

    public function create()
    {
        $rootCategories = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('rootCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($validated);
        return redirect()->route('categories.index');
    }
}
