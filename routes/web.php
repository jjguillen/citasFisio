<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Las rutas estáticas con lo que ofrece la empresa - PÁGINA ESTÁTICA
Route::get('/', function () {
    return redirect('/login');
});

Route::prefix('/dashboard')->group(function () {
    Route::middleware(['auth'])->group(function () {
        //Mis rutas ---------------------------------------

        //Ruta al entrar al panel de administración
        Route::get('/', [CitaController::class, 'index'])->name('dashboard');

        //Rutas asociadas al controlador resource CitaController
        //GET 	/citas 	index 	citas.index
        //GET 	/citas/create 	create 	citas.create
        //POST 	/citas 	store 	citas.store
        //GET 	/citas/{photo} 	show 	citas.show
        //GET 	/citas/{photo}/edit 	edit 	citas.edit
        //PUT/PATCH 	/citas/{photo} 	update 	citas.update
        //DELETE 	/citas/{photo} 	destroy 	citas.destroy
        Route::resource('citas', CitaController::class);
    
    });
});

require __DIR__.'/auth.php';
