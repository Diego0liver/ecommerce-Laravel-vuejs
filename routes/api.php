<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function(){
    Route::post('/registroAdm', [adminController::class, 'registroAdm']);
    Route::post('/loginAdmin', [adminController::class, 'loginAdmin']);
});


Route::post('/produtos', [ProdutoController::class, 'store']);