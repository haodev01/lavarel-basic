<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
Route::post('/authenticate', [LoginController::class, 'authenticate'],)->name('admin.authenticate');
Route::post('/doRegister', [LoginController::class, 'doRegister'])->name('admin.register.do');