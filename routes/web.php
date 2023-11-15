<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('paginaInicio');
});

Route::get('/paginaUsuario', function () {
    return view('paginaUsuario');
})->middleware(['auth', 'verified'])->name('paginaUsuario');

/*Route::get('/paginaCocheUsuario', [CocheController::class,'show']);*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';

Route::get('/paginaCocheUsuario', function () {
    $coche = CocheController::show();
    return view('paginaCocheUsuario')->with('coche', $coche);
})->middleware(['auth', 'verified'])->name('paginaCocheUsuario');


Route::get('/crearCocheFormulario', [CocheController::class,'formularioCrear'])->name('crearCocheFormulario');


Route::post('/anadirCoche', [CocheController::class,'store'])->name('anadirCoche');
