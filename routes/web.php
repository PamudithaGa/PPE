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
use App\Http\Controllers\Auth\RegisteredUserController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
    Route::get('/eventPage', [HomeController::class, 'eventPage'])->name('eventPage');
    Route::get('/offerings', [OfferController::class, 'index'])->name('offerings');
    
    
    //Wedding routes
    Route::get('/wedding', [WeddingController::class, 'index'])->name('weddings');
    Route::get('/sasiruwan', [WeddingController::class, 'sasiruwan'])->name('sasiruwan');
    Route::get('/loshitha', [WeddingController::class, 'loshitha'])->name('loshitha');
    Route::get('/dulaj', [WeddingController::class, 'dulaj'])->name('dulaj');
    
    //Admin routes
    Route::get('/ProductDashboard', [AdminController::class, 'dashboard'])->name('ProductDashboard');
    Route::get('/EventDashboard', [AdminController::class, 'events'])->name('EventDashboard');

    //products routes
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');


    //Events
    Route::post('/eventsAdd', [EventController::class, 'store'])->name('events.store'); 
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    // Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit'); // Show edit form
    // Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update'); // Update event
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');



    //Route::get('/events', [EventController::class, 'index'])->name('EventDashboard');

    //Route::put('/event/{id}/update', [EventController::class, 'update'])->name('event.update');
    
    //Book routes


    Route::get('/Bookings', [BookingController::class, 'index'])->name('event');
    Route::post('/Bookings', [BookingController::class, 'store'])->name('bookings.store');


    Route::get('/serivces', [HomeController::class, 'serivces'])->name('serivces');



    

require __DIR__.'/auth.php';



