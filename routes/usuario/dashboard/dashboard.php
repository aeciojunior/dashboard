<?php

use App\Http\Controllers\Usuario\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

//dashboard
Route::middleware('is_user')->controller(DashboardController::class)->prefix('user')->group(function(){
    Route::get('/dashboard','dashboard')->name('user-dashboard');
});
