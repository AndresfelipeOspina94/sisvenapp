<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\CategoriaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('producto', ProductoController::class);

    Route::resource('proveedor', ProveedorController::class)->parameters(['proveedor' => 'id']);

    Route::resource('metodo_pago', MetodoPagoController::class)->parameters(['metodo_pago' => 'id']);

    Route::resource('categoria', CategoriaController::class)->parameters(['categoria' => 'id']);
});



require __DIR__.'/auth.php';
