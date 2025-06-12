<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard genérico (puedes cambiar a prefijo admin después)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para el perfil (de Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tus rutas de admin protegidas (usuarios, mesas, platos, reservas)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('mesas', MesaController::class);
    Route::resource('platos', PlatoController::class);
    Route::resource('reservas', ReservaController::class);
});

require __DIR__.'/auth.php';  // Rutas Breeze de login, logout, register, etc.
