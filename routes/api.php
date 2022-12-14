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



Route::get('/todosCampeonatos', [App\Http\Controllers\CampeonatoController::class,"mostrar"]);

Route::post('/anadirDelegado',[App\Http\Controllers\DelegadoController::class,"store"]);
Route::post('/añadirArbitro',[App\Http\Controllers\ArbitroController::class,"store"]);
Route::post('/anadirEquipo',[App\Http\Controllers\EquipoController::class,"store"]);
Route::post('/anadirInscripcion',[App\Http\Controllers\InscripcionController::class,"store"]);
Route::post('/anadirCampeonato',[App\Http\Controllers\CampeonatoController::class,"store"]);
Route::post('/anadirCategoria',[App\Http\Controllers\CategoriaController::class,"store"]);
Route::post('/añadirInformacion',[App\Http\Controllers\InformacionController::class,"store"]);
Route::post('/anadirPartido',[App\Http\Controllers\PartidosController::class,"store"]);


Route::get('/nombreCategorias', [App\Http\Controllers\CategoriaController::class,"obtenerNombreCategoria"]);

Route::get('/haySemifinal/{id}', [App\Http\Controllers\PartidosController::class,"haySemifinal"]);


Route::get('/semiFinalA/{id}', [App\Http\Controllers\PartidosController::class,"semiFinalA"]);
Route::get('/semiFinalB/{id}', [App\Http\Controllers\PartidosController::class,"semiFinalB"]);

Route::get('/obtenerPartidoEspecifico/{id}', [App\Http\Controllers\PartidosController::class,"obtenerPartido"]);

Route::get('/obtenercategoriafixture/{id}', [App\Http\Controllers\PartidosController::class,"obtenerCategoria"]);
Route::get('/partidos', [App\Http\Controllers\PartidosController::class,"obtenerPartidos"]);
Route::get('/arbitro/{id}', [App\Http\Controllers\ArbitroController::class,"obtenerArbitro"]);
Route::get('/arbitros', [App\Http\Controllers\ArbitroController::class,"show"]);
Route::get('/obtenerEquipo/{id}', [App\Http\Controllers\EquipoController::class,"obtenerEquipo"]);
Route::get('/habilitadoSin', [App\Http\Controllers\InscripcionController::class,"obtenerHabilitadoSin"]);
Route::get('/habilitado', [App\Http\Controllers\InscripcionController::class,"obtenerHabilitado"]);
Route::get('/porCategoria/{id}', [App\Http\Controllers\InscripcionController::class,"obtenerCategoria"]);

Route::get('/equiposPuntos/{id}', [App\Http\Controllers\InscripcionController::class,"obtenerEquipos"]);

Route::get('/medioPago', [App\Http\Controllers\InscripcionController::class,"obtenerMedioPago"]);
Route::get('/pagoCompleto', [App\Http\Controllers\InscripcionController::class,"obtenerPagoCompleto"]);
Route::get('/categorias', [App\Http\Controllers\CategoriaController::class,"show"]);
Route::get('/existeCategoria/{id}', [App\Http\Controllers\CategoriaController::class,"existe"]);
Route::get('/administrador/{id}', [App\Http\Controllers\AdministradorController::class,"obtenerAdministrador"]);
Route::get('/delegado/{id}', [App\Http\Controllers\DelegadoController::class,"obtenerDelegado"]);
Route::get('/delegadoNombre/{id}', [App\Http\Controllers\DelegadoController::class,"obtenerNombreDelegado"]);
Route::get('/informacion', [App\Http\Controllers\InformacionController::class,"informacion"]);


Route::get('/obtenerFinal/{id}', [\App\Http\Controllers\PartidosController::class,"obtenerFinal"]);

Route::get('/hayFinal/{id}', [\App\Http\Controllers\PartidosController::class,"hayFinal"]);

Route::get('/obtenerPuntos/{id}', [\App\Http\Controllers\EquipoController::class,"obtenerPuntos"]);

Route::get('/obtenerEntrenador/{id}', [\App\Http\Controllers\EquipoController::class,"obtenerEntrenador"]);


Route::put('/subirPuntos/{id}', [\App\Http\Controllers\EquipoController::class,"subirPuntos"]);

Route::put('/actualizarPartido/{id}', [\App\Http\Controllers\PartidosController::class,"actualizarDatos"]);

Route::put('/actualizarPartidoPuntos/{id}', [\App\Http\Controllers\PartidosController::class,"actualizarPartido"]);


Route::put('/acutalizarFechas/{id}', [\App\Http\Controllers\CampeonatoController::class,"updateFechas"]);
Route::put('/acutalizarPagos/{id}', [\App\Http\Controllers\CampeonatoController::class,"updatePagos"]);
Route::put('/habilitarSinJugador/{id}', [\App\Http\Controllers\InscripcionController::class,"habilitarSinJugador"]);


Route::put('/eliminarEquipo/{id}',[\App\Http\Controllers\InscripcionController::class,"eliminarEquipo"]);

Route::delete('/eliminarCategoria/{id}',[\App\Http\Controllers\CategoriaController::class,"eliminar"]);
Route::delete('/eliminarArbitro/{id}',[\App\Http\Controllers\ArbitroController::class,"eliminar"]);
Route::delete('/eliminarFoto/{id}',[\App\Http\Controllers\InformacionController::class,"eliminar"]);

Route::get('/',function(){
    return "holamundo";
});

Route::put("pagcomprobantePagooCompleto/{id}", [ \App\Http\Controllers\CampeonatoController::class, "comprobantePago"]);

Route::get('/import-users',[UserController::class,'importUsers'])->name('import');
//Route::post('/upload-users',[UserController::class,'uploadUsers'])->name('upload');
Route::post('/upload-users', [App\Http\Controllers\UserController::class,"uploadUsers"])->name('upload');
/* Delegado Jugador */
Route::post('/comprobantePagoMedio/{id}',[App\Http\Controllers\InscripcionController::class,"comprobantePagoMedio"]);
Route::post('/addJugadoresExcel/{idEquipo}',[App\Http\Controllers\JugadorController::class,"addJugadoresExcel"]);
Route::get('/equipos/{categoria}', [App\Http\Controllers\EquipoController::class,"obtenerEquipos"]);
Route::get('/estadoInscripcion/{idDelegado}', [App\Http\Controllers\DelegadoController::class,"estadoInscripcion"]);
Route::put('/actualizarDelegado/{id}', [App\Http\Controllers\DelegadoController::class,"update"]);
Route::post('/agregarJugador', [App\Http\Controllers\JugadorController::class,"store"]);
Route::get('/obtenerJugadores', [App\Http\Controllers\JugadorController::class,"show"]);
Route::post('/setImgCi/{id}', [App\Http\Controllers\JugadorController::class,"setImgCi"]);
Route::post('/setImgJugador/{id}', [App\Http\Controllers\JugadorController::class,"setImgJugador"]);
Route::put('/actualizarJugador/{ci}', [App\Http\Controllers\JugadorController::class,"actualizarJugador"]);
Route::delete('/eliminarJugador/{ci}', [App\Http\Controllers\JugadorController::class,"eliminarJugador"]);

Route::get('/obtenerJugadores/{idEquipo}', [App\Http\Controllers\JugadorController::class,"obtenerJugadores"]);
Route::post('/pagoMedio/{idCam}', [App\Http\Controllers\CampeonatoController::class,"pagoMedio"]);
Route::post('/pagoCompleto/{idCam}', [App\Http\Controllers\CampeonatoController::class,"pagoCompleto"]);
Route::post('/comprobantePago/{idEq}', [App\Http\Controllers\InscripcionController::class,"comprobantePago"]);
Route::post('/agregarLogo/{idEq}', [App\Http\Controllers\EquipoController::class,"agregarLogo"]);
Route::delete('/eliminarJugadores/{idEq}', [App\Http\Controllers\JugadorController::class,"eliminarJugadores"]);
Route::post('/agregarFotoInfo', [App\Http\Controllers\InformacionController::class,"agregarFotoInfo"]);
Route::get('/obtenerJugadoresQr/{idE}', [App\Http\Controllers\JugadorController::class,"obtenerJugadoresQr"]);
Route::post('/agregarReglamento/{idC}', [App\Http\Controllers\CampeonatoController::class,"agregarReglamento"]);
