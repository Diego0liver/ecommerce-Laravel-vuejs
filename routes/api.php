<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function(){
    Route::post('/registroAdm', [adminController::class, 'registroAdm']);
    Route::post('/loginAdmin', [adminController::class, 'loginAdmin']);
});

Route::get('/produtos', [ProdutoController::class, 'index']);

Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'delet']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);

Route::get('pedido/{id}', [PedidoController::class, 'pedidoID']);
Route::get('pedido/{id}/produto', [PedidoController::class, 'show']);
Route::post('/pedido', [PedidoController::class, 'store']);
Route::delete('/pedido/{id}', [PedidoController::class, 'destroy']);