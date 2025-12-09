<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroCursoController;
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas del formulario de cursos 
Route::middleware('auth')->group(function () {

    // Crear registro
    Route::get('/registros/create', [RegistroCursoController::class, 'create'])
        ->name('registros.create');

    // Guardar registro
    Route::post('/registros', [RegistroCursoController::class, 'store'])
        ->name('registros.store');

    // Mostrar registro por FOLIO
    Route::get('/registros/{folio}', [RegistroCursoController::class, 'show'])
        ->name('registros.show');

    // Generar PDF DC-3
    Route::get('/registros/{folio}/dc3', [RegistroCursoController::class, 'generarDC3'])
        ->name('registros.dc3');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación
require __DIR__ . '/auth.php';
