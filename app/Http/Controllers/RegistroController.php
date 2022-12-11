<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delegado;
use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Campeonato;
use App\Models\Inscripcion;

class RegistroController extends Controller
{
    public function store(Request $request){
        $delegadoData= [
            "nombre" => $request->input("nombre"),
            "ci" => $request->input("ci"),
            "email" => $request->input("correo"),
            "celular" =>$request->input("numero"),
            "fechaNacimiento" => $request->input("fechaNac"),
            "nacionalidad" => $request->input("nacionalidad"),
            "genero" => $request->input("genero")
        ];
        
        /* return $delegadoData; */
        $delegado = Delegado::create($delegadoData);

        
        $delegadoObject = Delegado::where("ci",$request->input("ci"))->get();
        $delegado_id = $delegadoObject[0]->id;
        

        $categoriaObject = Categoria::where("nombre",$request->input("categoria"))->get();
        $categoria_id = $categoriaObject[0]->id;
       
        $equipoData = [
            "nombre" => $request->input("nombreEquipo") ,
            "siglas" => $request->input("siglas"),
            "logo" => $request->input("logo"),
            "cantidad" => $request->input("cantJug"),
            "fechaCreacion" => $request->input("creacion"),
            "delegado_id" => $delegado_id,
            "categoria_id" => $categoria_id
        ];
        $equipo = Equipo::create($equipoData);
        
       
        
        $campeonatoObject = Campeonato::where("id", 1)->get();
        $campeonato_id = $campeonatoObject[0]->id;

        $equipoObject = Equipo::where("nombre",$request->input("nombreEquipo"))->get();
        $equipo_id = $equipoObject[0]->id;

        $inscripcionesData = [
            "comprobantePago" => $request->input("pago"),
            "pagoMedioUno" => false,
            "pagoMedioDos" => false,
            "pagoEntero" => false,
            "equipo_id" => $equipo_id,
            "campeonato_id" => $campeonato_id
        ];


        $inscripcion = Inscripcion::create($inscripcionesData);
        return \response()->json(["res" => true, "message" =>"insertado correctamente"],200);
    }
}
