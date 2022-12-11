<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* Route::get("delegados",[App\Http\Controllers\DelegadoController::class,'index']);
Route::get("delegados/{delegado}",[App\Http\Controllers\DelegadoController::class,'show']);

Route::delete("delegados/{delegado}",[App\Http\Controllers\DelegadoController::class,'destroy']);

Route::post("delegados",[App\Http\Controllers\DelegadoController::class,'store']);

Route::put("delegados/{delegado}",[App\Http\Controllers\DelegadoController::class,'update ']); */

Route::apiResource('delegados',\App\Http\Controllers\DelegadoController::class);

Route::post("registro", [ \App\Http\Controllers\RegistroController::class, "store"]);

/* Login */
Route::post("login",[ \App\Http\Controllers\UserController::class, "login"] );

/* Campeonato */
Route::apiResource('campeonato',\App\Http\Controllers\CampeonatoController::class);

Route::put("pagoMedio/{id}", [ \App\Http\Controllers\CampeonatoController::class, "pagoMedio"]);

Route::put("pagoCompleto/{id}", [ \App\Http\Controllers\CampeonatoController::class, "pagoCompleto"]);

Route::put("pagcomprobantePagooCompleto/{id}", [ \App\Http\Controllers\CampeonatoController::class, "comprobantePago"]);

Route::put("comprobantePagoMedio/{id}", [ \App\Http\Controllers\CampeonatoController::class, "comprobantePagoMedio"]);