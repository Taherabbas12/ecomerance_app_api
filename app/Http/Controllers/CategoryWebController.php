<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\SimilarCategories;

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
        $rootCategories = Category::get();
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
    //_______________
    public function deleteSimilarCategory($id)
    {
        $similarCategory = SimilarCategories::findOrFail($id);
        $similarCategory->delete();

        return redirect()->back()->with('success', 'تم حذف الفئة المتشابهة بنجاح.');
    }


    public function showSimilarCategories()
    {
        $similarCategories = SimilarCategories::with(['category', 'similarCategory'])->get();
        return view('categories.similar', compact('similarCategories'));
    }

    public function showComparisonForm()
    {
        $categories = Category::all();
        return view('categories.form', compact('categories'));
    }

    public function compareCategories(Request $request)
    {
        $request->validate([
            'category_id_1' => 'required|exists:categories,id',
            'category_id_2' => 'required|exists:categories,id',
        ]);

        $category1 = Category::findOrFail($request->category_id_1);
        $category2 = Category::findOrFail($request->category_id_2);

        $productsCategory1 = Product::where('category_id', $category1->id)->get();
        $productsCategory2 = Product::where('category_id', $category2->id)->get();

        return view('categories.compare', compact('category1', 'category2', 'productsCategory1', 'productsCategory2'));
    }
    public function saveComparison(Request $request)
    {
        $request->validate([
            'category_id_1' => 'required|exists:categories,id',
            'category_id_2' => 'required|exists:categories,id',
        ]);

        SimilarCategories::create([
            'category_id' => $request->category_id_1,
            'similar_category_id' => $request->category_id_2,
        ]);

        return redirect()->route('similar.categories')->with('success', 'تم حفظ المقارنة بنجاح.');
    }

}
