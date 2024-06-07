<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('admin.auth.login');
})->name('admin.login');
Route::post('/authenticate', [LoginController::class, 'authenticate'],)->name('admin.authenticate');
Route::get('/', function () {
    return view('admin.dashboard.home');
})->middleware('auth');
