<?php


use App\Http\Controllers\Api\ApiVendaController;
use Illuminate\Support\Facades\Route;

Route::controller(ApiVendaController::class)->prefix('venda')->withoutMiddleware("throttle:api")
    ->middleware("throttle:300:1")->group(function () {
        Route::post('/cadastro', 'cadastro');
    });