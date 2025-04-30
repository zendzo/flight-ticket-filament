<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/flight', [FlightController::class, 'index'])->name('flight.index');
Route::get('/flight/{flightNumber}/choose-tiers', [FlightController::class, 'show'])->name('flight.show');

Route::get('flight/booking/{flightNumber}', [BookingController::class, 'booking'])->name('booking.booking');

Route::get('/flight/booking/{flightNumber}/choose-seat', [BookingController::class, 'chooseSeat'])->name('booking.choose-seat');
Route::post('/flight/booking/{flightNumber}/confirm-seat', [BookingController::class, 'confirmSeat'])->name('booking.confirm-seat');
Route::get('/flight/booking/{flightNumber}/passenger-details', [BookingController::class, 'passengerDetails'])->name('booking.passenger-details');

Route::get('/flight/booking/check-booking', [BookingController::class, 'checkBooking'])->name('booking.check');
