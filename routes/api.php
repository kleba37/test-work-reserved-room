<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Booking\BookingController;
use App\Http\Controllers\Api\Room\GetFreeRoomListController;
use App\Http\Controllers\Api\Room\GetRoomListController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
	Route::post('/register', RegisterController::class);
	Route::post('/login', LoginController::class);
	Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
});

Route::prefix('room')->group(function () {
	Route::get('/list', GetRoomListController::class)->name('room-list');
	Route::post('/free', GetFreeRoomListController::class)->name('free-room-list');
});

Route::post('/booking', BookingController::class)->name('booking');
