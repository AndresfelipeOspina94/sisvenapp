<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MetodoPagoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de recurso para Producto
Route::resource('producto', ProductoController::class);

// Rutas de recurso para Proveedor
Route::resource('proveedor', ProveedorController::class)->parameters(['proveedor' => 'id']);

// Rutas de recurso para MetodoPago
Route::resource('metodo_pago', MetodoPagoController::class)->parameters(['metodo_pago' => 'id']);
