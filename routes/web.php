<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketsBookingController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\AdminDashboardController;

Route::view('/', 'Users.home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/eventPage', [HomeController::class, 'eventPage'])->name('eventPage');
Route::get('/serivces', [HomeController::class, 'serivces'])->name('serivces');
Route::get('/offerings', [OfferController::class, 'index'])->name('offerings');
    
Route::get('/wedding', [WeddingController::class, 'index'])->name('weddings');
Route::get('/sasiruwan', [WeddingController::class, 'sasiruwan'])->name('sasiruwan');
Route::get('/loshitha', [WeddingController::class, 'loshitha'])->name('loshitha');
Route::get('/dulaj', [WeddingController::class, 'dulaj'])->name('dulaj');
    
Route::get('/offerings', [ProductController::class, 'offerings'])->name('offerings');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/product/details/{id}', [ProductController::class, 'show'])->name('product.details');

Route::get('/event-dashboard', [EventController::class, 'index'])->name('EventDashboard');
Route::post('/eventsAdd', [EventController::class, 'store'])->name('events.store'); 
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/Bookings', [BookingController::class, 'index'])->name('event');
Route::post('/Bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/userdashboard', [UserController::class, 'index'])->name('userdashboard');
Route::post('/purchase-ticket', [EventController::class, 'purchaseTicket']);

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->middleware('auth');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->middleware('auth');

Route::get('/adlogin', [AdminController::class, 'login'])->name('adlogin');
Route::post('/adlogin', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add'); 
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove'); 

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');

    Route::post('create', [TicketsBookingController::class, 'create'])->name('booking.create');
    Route::get('success', [TicketsBookingController::class, 'success'])->name('booking.success');
    Route::get('cancel', [TicketsBookingController::class, 'cancel'])->name('booking.cancel');
});



require __DIR__.'/auth.php';
