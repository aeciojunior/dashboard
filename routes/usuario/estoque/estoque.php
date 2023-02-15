<?php


use App\Http\Controllers\Usuario\Estoque\EstoqueController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_user')->controller(EstoqueController::class)->prefix('user')->group(function(){
        Route::get('/estoque','lista')->name('user-lista-estoque');
});