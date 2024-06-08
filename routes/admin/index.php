

<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'],function() {
  require_once('guest.php');
});

Route::group(['middleware' => 'auth'],function() {
  require_once('auth.php');
});