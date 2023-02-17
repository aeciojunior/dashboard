<?php

use App\Http\Controllers\Usuario\Caixa\CaixaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(CaixaController::class)->prefix('user')->group(function(){
        Route::get('/caixas','getLista')->name('user-lista-caixa');
});



