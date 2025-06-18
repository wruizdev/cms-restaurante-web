<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



// Dashboard genérico (se puede cambiar a prefijo admin después)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para el perfil (de Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de admin protegidas (usuarios, mesas, platos, reservas)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('mesas', MesaController::class);
    Route::resource('platos', PlatoController::class);
    Route::resource('reservas', ReservaController::class);
    //Para badge que anuncia nuevas reservas en el panel admin reservas.index
    Route::get('/admin/reservas/nuevas', [ReservaController::class, 'nuevas'])->name('admin.reservas.nuevas');
    Route::get('/admin/estadisticas', [EstadisticasController::class, 'index'])->name('admin.estadisticas');
});

require __DIR__.'/auth.php';  // Rutas Breeze de login, logout, register, etc.


//Ruta para actualizar solo el estado de la mesa y liberar
/*patch: indica que vamos a actualizar parcialmente un recurso (solo el campo estado).

/mesas/{id}/liberar: ruta dinámica donde {id} es el ID de la mesa.

[MesaController::class, 'liberar']: llama al método liberar() del controlador MesaController.

->name('mesas.liberar'): asigna un nombre a esta ruta para poder usar route('mesas.liberar', $mesa->id) en la vista.*/
Route::patch('/mesas/{id}/liberar', [MesaController::class, 'liberar'])->name('mesas.liberar');
Route::patch('/reservas/{id}/visto', [ReservaController::class, 'visto'])->name('reservas.visto');

//Rutas para página web
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/reservas', [HomeController::class, 'reservas'])->name('reservas');
Route::get('/carta', [HomeController::class, 'carta'])->name('carta');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
//Esto permite que el home funcione tanto para mostrar como para procesar el formulario desde la función reservaWeb.
Route::match(['get', 'post'], '/', [ReservaController::class, 'reservaWeb'])->name('home');







