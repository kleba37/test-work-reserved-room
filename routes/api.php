<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
	Route::post('/register', [RegisterController::class]);
	Route::post('/login', [LoginController::class]);
	Route::post('/logout', [LogoutController::class])->middleware('auth:sanctum');
});
