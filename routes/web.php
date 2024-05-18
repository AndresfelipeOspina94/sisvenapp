<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MetodoPagoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('producto', ProductoController::class);

Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedor.index');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedor.create');
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedor.update');
Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedor.edit');

Route::get('/metodo_pago', [MetodoPagoController::class, 'index'])->name('metodo_pago.index');
Route::post('/metodo_pago', [MetodoPagoController::class, 'store'])->name('metodo_pago.store');
Route::get('/metodo_pago/create', [MetodoPagoController::class, 'create'])->name('metodo_pago.create');
Route::delete('/metodo_pago/{id}',[MetodoPagoController::class, 'destroy'])->name('metodo_pago.destroy');
Route::put('/metodo_pago/{id}', [MetodoPagoController::class, 'update'])->name('metodo_pago.update');
Route::get('/metodo_pago/{id}/edit', [MetodoPagoController::class, 'edit'])->name('metodo_pago.edit');
