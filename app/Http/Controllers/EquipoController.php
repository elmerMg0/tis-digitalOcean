<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Delegado;

class EquipoController extends Controller
{

    public function subirPuntos(Request $request,$id)
    {
        $codEquipo = Equipo::where("NOMBRE",$id)->pluck('IDEQUIPO')->first();
        $equipo = Equipo::findOrFail($codEquipo);
        $equipo->PUNTOS=$request->PUNTOS;
        $equipo->save();
        return $equipo;
    }

    public function obtenerPuntos($id)
    {
        return Equipo::where("NOMBRE", $id)->pluck('PUNTOS')->first();
    }

    public function obtenerEntrenador($id)
    {
        $delegago = Equipo::where("NOMBRE", $id)->pluck('IDDELEGADO');
        return Delegado::where("IDDELEGADO",$delegago)->pluck('NOMBRE');
    }

    public function store(Request $request)
    {
        $equipo = new Equipo;
        $equipo->IDEQUIPO=$request->IDEQUIPO;
        $equipo->NOMBRE=$request->NOMBRE;
        $equipo->SIGLAS=$request->SIGLAS;
        $equipo->LOGO=$request->LOGO;
        $equipo->CANTIDAD=$request->CANTIDAD;
        $equipo->FECHACREACION=$request->FECHACREACION;
        $equipo->IDDELEGADO=$request->IDDELEGADO;
        $equipo->CATEGORIA=$request->CATEGORIA;
        $equipo->save();
        return $equipo;
    }


    public function show()
    {
        return Equipo::get();
    }



    public function obtenerEquipo($id)
    {
        return Equipo::where("NOMBRE",$id)->get();
    }

    public function agregarLogo(Request $request, $id){
        $file = $request->file("imagen");
        $nombre = "logo".time().".".$file->extension();
        $file->storeAs("", $nombre,'public');

        $equipo = Equipo::where("IDEQUIPO",$id)->first();
        $equipo->LOGO = $nombre;
        $equipo->save();


    }
    public function obtenerEquipos (Request $request, $cat){
        $equipos = Equipo::where("CATEGORIA",$cat)->get();
        return $equipos;
    }

}
