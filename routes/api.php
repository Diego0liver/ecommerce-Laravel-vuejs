<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

//rotas para registrar e logar
Route::prefix('auth')->group(function(){
    Route::post('/registroAdm', [adminController::class, 'registroAdm']);
    Route::post('/loginAdmin', [adminController::class, 'loginAdmin']);
});

//rotas dos produtos do ecommerce
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/categoria/{categoria}', [ProdutoController::class, 'getAcess']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);

//rotas dos produtos do Administrador
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'delet']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::post('/produtos/cart', [PedidoProdutoController::class, 'store']);

//rotas do cliente
Route::group(['middleware' => ['auth:sanctum']], function(){
 Route::prefix('/cliente')->group(function(){
    // Route::get('/pedido/{id}', [PedidoController::class, 'pedidoID'])->middleware('auth');//pedido pelo ID do usuario
    // Route::get('/pedido/{id}', [PedidoController::class, 'show'])->middleware('auth'); //pedido pelo ID do pedido
    Route::get('/user/{id}', [adminController::class, 'cliente'])->middleware('auth');
    Route::post('/pedido', [PedidoController::class, 'store'])->middleware('auth');
    Route::delete('/pedido/{id}', [PedidoController::class, 'destroy'])->middleware('auth');
 });
});

Route::get('/pedidos/{pedido_id}/produtos', [PedidoProdutoController::class, 'produtos']);
Route::get('/produtopedido/{id}', [PedidoController::class, 'show']);