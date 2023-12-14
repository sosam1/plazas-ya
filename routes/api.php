<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\ResenaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('plaza')->group(function () {
    Route::get('/', [PlazaController::class, 'GetPlazas']);
    Route::get('/{id}', [PlazaController::class, 'GetPlaza']);
    Route::post('/', [PlazaController::class, 'CreatePlaza']);
    Route::put('/{id}', [PlazaController::class, 'UpdatePlaza']);
    Route::delete('/{id}', [PlazaController::class, 'DeletePlaza']);
});

Route::prefix('actividad')->group(function () {
    Route::get('/', [ActividadController::class, 'GetActividades']);
    Route::get('/{id}', [ActividadController::class, 'GetActividad']);
    Route::post('/', [ActividadController::class, 'CreateActividad']);
    Route::put('/{id}', [ActividadController::class, 'UpdateActividad']);
    Route::delete('/{id}', [ActividadController::class, 'DeleteActividad']);

    Route::post('/asignar', [ActividadController::class, 'AsignarActividadAPlaza']);
});

Route::prefix('resena')->group(function () {
    Route::get('/', [ResenaController::class, 'GetAllResenas']);
    Route::get('/{id}', [ResenaController::class, 'GetResena']);
    Route::get('/plaza/{id}', [ResenaController::class, 'GetResenasDePlaza']);
    Route::post('/', [ResenaController::class, 'CreateResena']);
    Route::delete('/{id}', [ResenaController::class, 'DeleteResena']);
});
