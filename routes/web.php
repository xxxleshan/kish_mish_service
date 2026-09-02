<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('landing');
});

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings');

