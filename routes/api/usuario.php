<?php

use App\Http\Controllers\Api\ApiUsuarioController;
use Illuminate\Support\Facades\Route;


Route::controller(ApiUsuarioController::class)->prefix('usuario')->withoutMiddleware("throttle:api")
    ->middleware("throttle:300:1")->group(function () {
        Route::post('/cadastro', 'cadastro');
    });