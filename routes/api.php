<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CitaController;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Cita;
use App\Http\Resources\CitaResource;
use App\Http\Resources\ProductoResource;
use App\Http\Resources\PedidoResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Todo lo que esté bajo el middleware auth:sanctum comprueba el token
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/pedidos', function () {
        return PedidoResource::collection(Pedido::all());
    }); 
    Route::get('/pedidos/{id}', function ($id) {
        return new PedidoResource(Pedido::findOrFail($id));
    }); 
    Route::get('/productos', function () {
        return ProductoResource::collection(Producto::all());
    }); 
    Route::get('/citas', function () {
        return CitaResource::collection(Cita::all());
    });

    Route::post('/citas', [CitaController::class, 'createApi']);
});

//Estas rutas van fuera de auth:sanctum por que son las que generan el token, aún no lo tenemos
Route::post('/registro', [AuthApiController::class, 'registro']);
Route::post('/login', [AuthApiController::class, 'login']);