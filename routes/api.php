<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\PlazaController;

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

Route::post('/plaza', [PlazaController::class, 'CreatePlaza']);
Route::get('/plaza', [PlazaController::class, 'GetPlazas']);
Route::get('/plaza/{id}', [PlazaController::class, 'GetPlaza']);
Route::put('/plaza/{id}', [PlazaController::class, 'UpdatePlaza']);
Route::delete('/plaza/{id}', [PlazaController::class, 'DeletePlaza']);

Route::post('/actividad', [ActividadController::class, 'CreateActividad']);
Route::get('/actividad', [ActividadController::class, 'GetActividades']);
Route::get('/actividad/{id}', [ActividadController::class, 'GetActividad']);
Route::put('/actividad/{id}', [ActividadController::class, 'UpdateActividad']);
Route::delete('/actividad/{id}', [ActividadController::class, 'DeleteActividad']);

Route::post('/actividad/asignar', [ActividadController::class, 'AsignarActividadAPlaza']);
Route::post('/plaza/resena', [ActividadController::class, 'CreateResena']);
Route::delete('/plaza/resena/{id}', [ActividadController::class, 'DeleteResena']);