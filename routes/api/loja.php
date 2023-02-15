<?php

use App\Http\Controllers\Api\ApiLojaController;
use Illuminate\Support\Facades\Route;

Route::controller(ApiLojaController::class)->prefix('loja')->withoutMiddleware("throttle:api")
    ->middleware("throttle:300:1")->group(function () {
        Route::post('/cadastro', 'cadastro');
    });
