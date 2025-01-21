<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\CartApiController;




Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/tokens', function (Request $request) {
    return $request->user()->tokens;
})->name('tokens.index');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/offerings', [ProductApiController::class, 'apiOfferings'])->name('api.offerings');
//Route::get('/product/details/{id}', [ProductApiController::class, 'show'])->name('api.product.details');
Route::get('/product/details/{id}', [ProductApiController::class, 'show'])->name('product.details');




Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/cart', [CartApiController::class, 'index']); // Get cart items
    Route::post('/cart/add', [CartApiController::class, 'addToCart']); // Add item to cart
    Route::delete('/cart/{id}', [CartApiController::class, 'remove']); // Remove item
});
