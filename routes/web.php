<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('root');
Route::get('/check-booking', [App\Http\Controllers\Frontend\FrontendController::class, 'checkBooking'])->name('checbooking');
Route::get('/find-kos', [App\Http\Controllers\Frontend\FrontendController::class, 'findKos'])->name('findkos');
Route::get('/find-result', [App\Http\Controllers\Frontend\FrontendController::class, 'findResult'])->name('findkos.result');
Route::get('/catagory/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'categoryKos'])->name('kos.category');
Route::get('/city/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'cityKos'])->name('kos.city');
Route::get('/kos/detail/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'detailKos'])->name('kos.detail');
Route::get('/kos/{slug}/room', [App\Http\Controllers\Frontend\FrontendController::class, 'rooms'])->name('kos.rooms');

Route::get('/kos/booking/{slug}', [App\Http\Controllers\Frontend\BookingController::class, 'booking'])->name('booking');
Route::get('/kos/booking/{slug}/information', [App\Http\Controllers\Frontend\BookingController::class, 'information'])->name('booking.information');
Route::post('/kos/booking/{slug}/information/save', [App\Http\Controllers\Frontend\BookingController::class, 'saveInformation'])->name('booking.information.save');
Route::get('/kos/booking/{slug}/checkout', [App\Http\Controllers\Frontend\BookingController::class, 'checkout'])->name('booking.checkout');
Route::post('/kos/booking/{slug}/payment', [App\Http\Controllers\Frontend\BookingController::class, 'payment'])->name('booking.payment');
Route::get('/booking-success', [App\Http\Controllers\Frontend\BookingController::class, 'success'])->name('booking.success');