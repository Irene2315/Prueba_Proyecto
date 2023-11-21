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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Ruta para ver los datos del usuario
Route::get('/paginaUsuario', function () {
    return view('paginaUsuario');
})->middleware(['auth', 'verified'])->name('paginaUsuario');

//Ruta para ver los datos de los coches del usuario
Route::get('/paginaCocheUsuario', [CocheController::class, 'index'])->name('paginaCocheUsuario');

//Ruta para rellenar los datos del coche que se va a inserta
Route::get('/crearCocheFormulario', [CocheController::class, 'create'])->name('crearCocheFormulario');

//Ruta para añadir el coche a la BDD que se ha rellenado en el formulario de la ruta anterior
Route::post('/anadirCoche', [CocheController::class, 'store'])->name('anadirCoche');

//Ruta para rellenar los datos del coche que se va ha modificar
Route::get('/modificarCocheFormulario/{matricula}', [CocheController::class, 'edit'])->name('modificarCocheFormulario');

//Ruta para modificar el coche en la BDD que se ha modificado en el formulario de la ruta anterior
Route::put('/actualizarCoche', [CocheController::class, 'update'])->name('actualizarCoche');

//Ruta para eliminar un coche que se ha selecionado 
Route::delete('/eliminarCoche/{matricula}', [CocheController::class, 'destroy'])->name('eliminarCoche');



