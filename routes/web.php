<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
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
