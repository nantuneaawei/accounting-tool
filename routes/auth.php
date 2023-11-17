<?php

use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/create', [AuthController::class, 'create']);

Route::post('/loginAuth', [AuthController::class, 'loginAuth'])->name('loginAuth');
