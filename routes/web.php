<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/todosCampeonatos', "App\Http\Controllers\CampeonatoController@mostrar");

Route::post('/anadirDelegado',"App\Http\Controllers\DelegadoController@store");
Route::post('/añadirArbitro',"App\Http\Controllers\ArbitroController@store");
Route::post('/anadirEquipo',"App\Http\Controllers\EquipoController@store");
Route::post('/anadirInscripcion',"App\Http\Controllers\InscripcionController@store");
Route::post('/anadirCampeonato',"App\Http\Controllers\CampeonatoController@store");
Route::post('/anadirCategoria',"App\Http\Controllers\CategoriaController@store");
Route::post('/añadirInformacion',"App\Http\Controllers\InformacionController@store");
Route::post('/anadirPartido',"App\Http\Controllers\PartidosController@store");

Route::get('/nombreCategorias', "App\Http\Controllers\CategoriaController@obtenerNombreCategoria");

Route::get('/haySemifinal/{id}', "App\Http\Controllers\PartidosController@haySemifinal");


Route::get('/semiFinalA/{id}', "App\Http\Controllers\PartidosController@semiFinalA");
Route::get('/semiFinalB/{id}', "App\Http\Controllers\PartidosController@semiFinalB");

Route::get('/obtenerPartidoEspecifico/{id}', "App\Http\Controllers\PartidosController@obtenerPartido");

Route::get('/obtenercategoriafixture/{id}', "App\Http\Controllers\PartidosController@obtenerCategoria");
Route::get('/partidos', "App\Http\Controllers\PartidosController@obtenerPartidos");
Route::get('/arbitro/{id}', "App\Http\Controllers\ArbitroController@obtenerArbitro");
Route::get('/arbitros', "App\Http\Controllers\ArbitroController@show");
Route::get('/obtenerEquipo/{id}', "App\Http\Controllers\EquipoController@obtenerEquipo");
Route::get('/habilitadoSin', "App\Http\Controllers\InscripcionController@obtenerHabilitadoSin");
Route::get('/habilitado', "App\Http\Controllers\InscripcionController@obtenerHabilitado");
Route::get('/porCategoria/{id}', "App\Http\Controllers\InscripcionController@obtenerCategoria");

Route::get('/equiposPuntos/{id}', "App\Http\Controllers\InscripcionController@obtenerEquipos");

Route::get('/medioPago', "App\Http\Controllers\InscripcionController@obtenerMedioPago");
Route::get('/pagoCompleto', "App\Http\Controllers\InscripcionController@obtenerPagoCompleto");
Route::get('/categorias', "App\Http\Controllers\CategoriaController@show");
Route::get('/existeCategoria/{id}', "App\Http\Controllers\CategoriaController@existe");
Route::get('/administrador/{id}', "App\Http\Controllers\AdministradorController@obtenerAdministrador");
Route::get('/delegado/{id}', "App\Http\Controllers\DelegadoController@obtenerDelegado");
Route::get('/delegadoNombre/{id}', "App\Http\Controllers\DelegadoController@obtenerNombreDelegado");
Route::get('/obtenerEquipo/{id}', "App\Http\Controllers\EquipoController@obtenerEquipo");
Route::get('/informacion', "App\Http\Controllers\InformacionController@informacion");

Route::get('/obtenerFinal/{id}', "App\Http\Controllers\PartidosController@obtenerFinal");

Route::get('/hayFinal/{id}', "App\Http\Controllers\PartidosController@hayFinal");

Route::get('/obtenerPuntos/{id}', "App\Http\Controllers\EquipoController@obtenerPuntos");

Route::get('/obtenerEntrenador/{id}', "App\Http\Controllers\EquipoController@obtenerEntrenador");


Route::put('/actualizarPartido/{id}', "App\Http\Controllers\PartidosController@actualizarDatos");

Route::put('/subirPuntos/{id}', "App\Http\Controllers\EquipoController@subirPuntos");

Route::put('/actualizarPartidoPuntos/{id}', "App\Http\Controllers\PartidosController@actualizarPartido");

Route::put('/acutalizarFechas/{id}', "App\Http\Controllers\CampeonatoController@updateFechas");
Route::put('/acutalizarPagos/{id}', "App\Http\Controllers\CampeonatoController@updatePagos");
Route::put('/habilitarSinJugador/{id}', "App\Http\Controllers\InscripcionController@habilitarSinJugador");

Route::delete('/eliminarCategoria/{id}',"App\Http\Controllers\CategoriaController@eliminar");
Route::delete('/eliminarArbitro/{id}',"App\Http\Controllers\ArbitroController@eliminar");
Route::delete('/eliminarFoto/{id}',"App\Http\Controllers\InformacionController@eliminar");

Route::get('/',function(){
    return "holamundo";
});


Route::get('/import-users',[UserController::class,'importUsers'])->name('import');
//Route::post('/upload-users',[UserController::class,'uploadUsers'])->name('upload');
Route::post('/upload-users', "App\Http\Controllers\UserController@uploadUsers")->name('upload');
/* Delegado Jugador */
Route::post('/comprobantePagoMedio/{id}',"App\Http\Controllers\InscripcionController@comprobantePagoMedio");
Route::post('/addJugadoresExcel/{idEquipo}',"App\Http\Controllers\JugadorController@addJugadoresExcel");
Route::get('/equipos/{categoria}', "App\Http\Controllers\EquipoController@obtenerEquipos");
Route::get('/estadoInscripcion/{idDelegado}', "App\Http\Controllers\DelegadoController@estadoInscripcion");
Route::put('/actualizarDelegado/{id}', "App\Http\Controllers\DelegadoController@update");
Route::post('/agregarJugador', "App\Http\Controllers\JugadorController@store");
Route::get('/obtenerJugadores', "App\Http\Controllers\JugadorController@show");
Route::post('/setImgCi/{id}', "App\Http\Controllers\JugadorController@setImgCi");
Route::post('/setImgJugador/{id}', "App\Http\Controllers\JugadorController@setImgJugador");
Route::put('/actualizarJugador/{ci}', "App\Http\Controllers\JugadorController@actualizarJugador");
Route::delete('/eliminarJugador/{ci}', "App\Http\Controllers\JugadorController@eliminarJugador");

Route::get('/obtenerJugadores/{idEquipo}', "App\Http\Controllers\JugadorController@obtenerJugadores");
Route::post('/pagoMedio/{idCam}', "App\Http\Controllers\CampeonatoController@pagoMedio");
Route::post('/pagoCompleto/{idCam}', "App\Http\Controllers\CampeonatoController@pagoCompleto");
Route::post('/comprobantePago/{idEq}', "App\Http\Controllers\InscripcionController@comprobantePago");
Route::post('/agregarLogo/{idEq}', "App\Http\Controllers\EquipoController@agregarLogo");
Route::delete('/eliminarJugadores/{idEq}', "App\Http\Controllers\JugadorController@eliminarJugadores");
Route::post('/agregarFotoInfo', "App\Http\Controllers\InformacionController@agregarFotoInfo");
Route::get('/obtenerJugadoresQr/{idE}', "App\Http\Controllers\JugadorController@obtenerJugadoresQr");
/* Para produccion */
/* Route::get('/{any}',function(){
    return view('index');
})->where('any','.*'); */
