<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/cliente', [ClienteController::class, 'store']);

Route::get('/cliente/find/{id}', [ClienteController::class, 'show']);

Route::get('/cliente', [ClienteController::class, 'index']);

Route::put('/cliente', [ClienteController::class, 'update']);

Route::delete('/cliente/{id}', [ClienteController::class, 'delete']);



/** Livros **/
Route::post('/produto', [ProdutoController::class, 'store']);

Route::get('/produto/find/{id}', [ProdutoController::class, 'show']);

Route::get('/produto', [ProdutoController::class, 'index']);

Route::put('/produto', [ProdutoController::class, 'update']);

Route::delete('/produto/{id}', [ProdutoController::class, 'delete']);



/*Vendas*/
Route::post('/vendas', [VendaController::class, 'store']);

Route::get('/vendas/find/{id}', [VendaController::class, 'show']);

Route::get('/vendas', [VendaController::class, 'index']);

Route::put('/vendas', [VendaController::class, 'update']);

Route::delete('/vendas/{id}', [VendaController::class, 'delete']);

