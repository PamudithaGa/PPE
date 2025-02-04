<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\CartApiController;
use App\Http\Controllers\API\CheckoutApiController;
use App\Http\Controllers\API\EventApiController;
use App\Http\Controllers\API\TicketsBookingApiController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\API\ImageApiController;

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/tokens', function (Request $request) {
    return $request->user()->tokens;
})->name('tokens.index');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::get('/cart', [CartApiController::class, 'index']); 
    Route::post('/cart/add', [CartApiController::class, 'addToCart']);
    Route::delete('/cart/{id}', [CartApiController::class, 'remove']);

    Route::post('/checkout', [CheckoutApiController::class, 'checkout']); 
    Route::get('/checkout/success', [CheckoutApiController::class, 'success']);
    Route::get('/checkout/cancel', [CheckoutApiController::class, 'cancel']);

    Route::post('ticket/create', [TicketsBookingApiController::class, 'create']); 
    Route::get('ticket/success', [TicketsBookingApiController::class, 'success']);
    Route::get('ticket/cancel', [TicketsBookingApiController::class, 'cancel']); 

});

Route::get('/offerings', [ProductApiController::class, 'apiOfferings']);
Route::get('/product/details/{id}', [ProductApiController::class, 'show']);

Route::get('events', [EventApiController::class, 'index']);  
Route::get('events/{id}', [EventApiController::class, 'show']); 

Route::get('/image/{filename}', [ImageController::class, 'getImage']);
Route::get('/image/{filename}', [ImageApiController::class, 'getImage']);
