<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('admin.logout');
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('admin.dashboard.home');

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('blogs', BlogController::class);
