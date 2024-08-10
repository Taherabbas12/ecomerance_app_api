<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsWebController;
use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\SimilarProductWebController;
use App\Http\Controllers\CategoryComparisonController;

Route::get('categories/compare/form', [CategoryWebController::class, 'showComparisonForm'])->name('categories.compare.form');
Route::post('categories/compare', [CategoryWebController::class, 'compareCategories'])->name('categories.compare');
Route::post('/save-comparison', [CategoryWebController::class, 'saveComparison'])->name('save.comparison');
Route::get('/similar-categories', [CategoryWebController::class, 'showSimilarCategories'])->name('similar.categories');
Route::delete('/similar-categories/{id}', [CategoryWebController::class, 'deleteSimilarCategory'])->name('delete.similar.category');


Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductsWebController::class);
Route::resource('categories', CategoryWebController::class);




Route::get('products/{productId}/similar', [SimilarProductWebController::class, 'index'])->name('similarProducts.index');
Route::post('products/{productId}/similar', [SimilarProductWebController::class, 'store'])->name('similarProducts.store');
Route::delete('products/{productId}/similar/{similarProductId}', [SimilarProductWebController::class, 'destroy'])->name('similarProducts.destroy');

// Route::get('/products/{product}/similar-products', [SimilarProductController::class, 'index']);
