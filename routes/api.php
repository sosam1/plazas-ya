<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\app\Models\Direcciones;
use App\Http\Controllers\DireccionesController;


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

Route::post('/direcciones', [DireccionesController::class, 'CreateDireccion']);
Route::get('/direcciones', [DireccionesController::class, 'GetDirecciones']);
Route::get('/direcciones/{id}', [DireccionesController::class, 'GetDireccion']);
Route::put('/direcciones/{id}', [DireccionesController::class, 'UpdateDireccion']);
Route::delete('/direcciones/{id}', [DireccionesController::class, 'DeleteDireccion']);