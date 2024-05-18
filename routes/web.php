<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('producto', ProductoController::class);

Route::resource('proveedor', ProveedorController::class)->parameters(['proveedor' => 'id']);

Route::resource('metodo_pago', MetodoPagoController::class)->parameters(['metodo_pago' => 'id']);

Route::resource('categoria', CategoriaController::class)->parameters(['categoria' => 'id']);