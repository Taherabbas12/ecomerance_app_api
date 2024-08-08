<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsWebController;
use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\SimilarProductWebController;

use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductsWebController::class);
Route::resource('categories', CategoryWebController::class);




Route::get('products/{productId}/similar', [SimilarProductWebController::class, 'index'])->name('similarProducts.index');
Route::post('products/{productId}/similar', [SimilarProductWebController::class, 'store'])->name('similarProducts.store');
Route::delete('products/{productId}/similar/{similarProductId}', [SimilarProductWebController::class, 'destroy'])->name('similarProducts.destroy');

// Route::get('/products/{product}/similar-products', [SimilarProductController::class, 'index']);
