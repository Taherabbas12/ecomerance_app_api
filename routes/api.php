<?php



use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SimilarProductController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('products/{productId}/similar-products', [SimilarProductController::class, 'index']);
    Route::post('products/{productId}/similar-products', [SimilarProductController::class, 'store']);
    Route::delete('products/{productId}/similar-products/{similarProductId}', [SimilarProductController::class, 'destroy']);
});
