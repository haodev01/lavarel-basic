<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');
    Route::get('/register', function () {
        return view('admin.auth.register');
    })->name('admin.register');

    Route::post('/authenticate', [LoginController::class, 'authenticate'],)->name('admin.authenticate');
    Route::post('/doRegister', [LoginController::class, 'register'])->name('admin.register.do');
});


Route::get('/', function () {
    return view('admin.dashboard.home');
})->middleware('auth')->name('admin.dashboard.home');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('admin.logout');
