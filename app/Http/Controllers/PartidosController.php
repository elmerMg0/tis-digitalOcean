<?php

namespace App\Http\Controllers;

use App\Models\Partidos;
use App\Models\Ganador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PartidosController extends Controller
{
    public function haySemifinal ($id){
        return Partidos::where("FASE","semiFinal")->where("IDCATEGORIA",$id)->get();
    }

    public function hayFinal ($id){
        return Partidos::where("FASE","Final")->where("IDCATEGORIA",$id)->get();
    }

    public function obtenerFinal ($id){
        $ganador =  Partidos::where("FASE","semiFinal")->where("IDCATEGORIA",$id)->whereNotNull("GANADOR")->pluck('GANADOR');
        $perdedor =  Partidos::where("FASE","semiFinal")->where("IDCATEGORIA",$id)->whereNotNull("GANADOR")->pluck('PERDEDOR');

        $lista = array($ganador[0],$ganador[1],$perdedor[0],$perdedor[1]);
        return $lista;
    }

    public function semiFinalB($id)
    {
        $ganadoresB = Partidos::whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->where("GRUPO","Grupo B".$id)->pluck('GANADOR');
        $listaB = array();
        $i=0;
        while($i<count($ganadoresB)){
            $equipo = Equipo::where("NOMBRE",$ganadoresB[$i])->pluck('PUNTOS')->first();
            $ganador = new Ganador;
            $ganador -> NOMBRE = $ganadoresB[$i];
            $ganador -> PUNTOS = $equipo;
            array_push($listaB,$ganador);
            $i++;
        }
        return $listaB;
    }

    public function semiFinalA($id)
    {
        $ganadoresA = Partidos::whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->where("GRUPO","Grupo A ".$id)->pluck('GANADOR');
        $listaA = array();
        $i=0;
        while($i<count($ganadoresA)){
            $equipo = Equipo::where("NOMBRE",$ganadoresA[$i])->pluck('PUNTOS')->first();
            $ganador = new Ganador;
            $ganador -> NOMBRE = $ganadoresA[$i];
            $ganador -> PUNTOS = $equipo;
            array_push($listaA,$ganador);

            $i++;
        }
        return $listaA;
    }

    public function obtenerPartido ($id)
    {
        $i = 0;
        $termino = 1;
        $categoria = "";
        //categoria
        while($termino == 1){
            if ($id[$i] != "*"){
                $categoria = $categoria.$id[$i];
            }else{
                $termino=0;
            }
            $i++;
        }
        //dia
        $termino=1;
        $dia = "";
        while($termino == 1){
            if ($id[$i] != "*"){
                $dia = $dia.$id[$i];
            }else{
                $termino=0;
            }
            $i++;
        }
        //hora
        $termino=1;
        $hora = "";
        while($i < strlen($id)){
            $hora = $hora.$id[$i];
            $i++;
        }

        return Partidos:: where("IDCATEGORIA",$categoria)->where("DIA",$dia)->where("HORA",$hora)-> get();
    }

    public function obtenerPartidos()
    {
        return Partidos::all();
    }

    public function actualizarDatos(Request $request,$id)
    {
        $partidos = Partidos::findOrFail($id);
        $partidos->EQUIPO1 = $request->EQUIPO1;
        $partidos->EQUIPO2 = $request->EQUIPO2;
        $partidos->GANADOR =$request->GANADOR;
        $partidos->PERDEDOR = $request->PERDEDOR;
        $partidos->EMPATE =$request->EMPATE;
        $partidos->ANOTACIONESEQ1 = $request->ANOTACIONESEQ1;
        $partidos->ANOTACIONESEQ2 = $request->ANOTACIONESEQ2;
        $partidos->save();
        return $partidos;
    }

    public function obtenerCategoria ($id)
    {
        return Partidos::where("IDCATEGORIA",$id)->get();
    }

    public function actualizarPartido (Request $request,$id)
    {
        $partidos = Partidos::findOrFail($id);
        $partidos->ANOTACIONESEQ1 = $request->ANOTACIONESEQ1;
        $partidos->ANOTACIONESEQ2 = $request->ANOTACIONESEQ2;
        $partidos->save();
        return $partidos;
    }

    public function store(Request $request)
    {
        $partidos = new Partidos;
        $partidos ->IDCATEGORIA=$request->IDCATEGORIA;
        $partidos ->GRUPO=$request->GRUPO;
        $partidos->EQUIPO1 = $request->EQUIPO1;
        $partidos->EQUIPO2 = $request->EQUIPO2;
        $partidos->GANADOR =$request->GANADOR;
        $partidos->PERDEDOR = $request->PERDEDOR;
        $partidos->EMPATE =$request->EMPATE;
        $partidos->ANOTACIONESEQ1 = $request->ANOTACIONESEQ1;
        $partidos->ANOTACIONESEQ2 = $request->ANOTACIONESEQ2;
        $partidos->LUGAR =$request->LUGAR;
        $partidos->HORA = $request->HORA;
        $partidos->DIA = $request->DIA;
        $partidos->FASE = $request->FASE;
        $partidos->save();
        return $partidos;
    }
}
