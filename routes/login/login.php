<?php

use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;



Route::middleware('is_visitante')->controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/login','loginIn')->name('login-post');
    Route::get('/','login')->name('login');
});

Route::middleware('auth')->controller(LoginController::class)->group(function(){
    Route::post('/logout','logout')->name('logout');
});