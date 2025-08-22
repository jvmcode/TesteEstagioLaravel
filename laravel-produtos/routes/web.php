<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect()->route('produtos.index'));

Route::resource('produtos', ProdutoController::class)->names([
    'index' => 'produtos.index',
    'create' => 'produtos.create',
    'store' => 'produtos.store',
    'edit' => 'produtos.edit',
    'update' => 'produtos.update',
    'destroy' => 'produtos.destroy',
]);


