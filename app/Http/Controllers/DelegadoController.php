<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Equipo;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Excel;
use App\Imports\CsvImport;

class DelegadoController extends Controller
{
    public function obtenerDelegado($id)
    {
        return Delegado::where("IDDELEGADO",$id)->get();
    }

    public function obtenerNombreDelegado($id)
    {
        return Delegado::where("CI",$id)->get();
    }

    public function store(Request $request)
    {
        $delegado = new Delegado;
        $delegado->IDDELEGADO=$request->IDDELEGADO;
        $delegado->NOMBRE=$request->NOMBRE;
        $delegado->CI = $request->CI;
        $delegado->EMAIL = $request->EMAIL;
        $delegado->CELULAR =$request->CELULAR;
        $delegado->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $delegado->NACIONALIDAD =$request->NACIONALIDAD;
        $delegado->GENERO = $request->GENERO;
        $delegado->CONTRASENA = $request->CONTRASENA;
        $delegado->save();
        return $delegado;
    }

    public function update(Request $request, $id){
        $delegado = Delegado::where("IDDELEGADO",$id)->first();
        $delegado->NOMBRE=$request->NOMBRE;
        $delegado->CI = $request->CI;
        $delegado->EMAIL = $request->EMAIL;
        $delegado->CELULAR =$request->CELULAR;
        $delegado->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $delegado->NACIONALIDAD =$request->NACIONALIDAD;
        $delegado->save();
        return $delegado;
    }

    public function estadoInscripcion($id){
        /* $equipo = Equipo::join("Incripcion","equipo.IDEQUIPO","=","incripcion.IDEQUIPO")
                            ->where("IDDELEGADO",$id)
                            ->get(); */
       $equipo = Inscripcion::join("Equipo","Incripcion.IDEQUIPO","=","Equipo.IDEQUIPO")
                            ->where("IDDELEGADO",$id)
                            ->get();
        return $equipo;
    }

   
}