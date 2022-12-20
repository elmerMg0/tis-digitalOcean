<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\EquipoDelegado;
use App\Models\Equipo;
use App\Models\Delegado;

class InscripcionController extends Controller
{
    public function eliminarEquipo ($id)
    {
        $equipo = Equipo::where("NOMBRE",$id)->first();
        //$Delegado = Delegado::where("IDDELEGADO",$equipo->IDDELEGADO)->first();
        $Equipo = Equipo::where("NOMBRE",$id)->pluck('IDEQUIPO')->first();
        $Inscripcion = Inscripcion::where("IDEQUIPO",$Equipo)->first();
        $Inscripcion -> PAGOMEDIO = "";
        $Inscripcion -> HABILITADO = "";
        $Inscripcion->save();
        return $Inscripcion;
    }

    public function store(Request $request)
    {
        $inscripcion = new Inscripcion;
        $inscripcion->IDEQUIPO = $request->IDEQUIPO;
        $inscripcion->COMPROBANTEPAGO = $request->COMPROBANTEPAGO;
        $inscripcion->PAGOMEDIO =$request->PAGOMEDIO;
        $inscripcion->COMPROBANTEMEDIO = $request->COMPROBANTEMEDIO;
        $inscripcion->HABILITADO =$request->HABILITADO;
        $inscripcion->save();
        return $inscripcion;
    }

    public function obtenerCategoria($id)
    {
        $lista = Inscripcion::where("HABILITADO","HabilitadoCompleto")->where("PAGOMEDIO","Completo")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->where("CATEGORIA",$id)->first();
            if ($equipo!= null){
                array_push($listado,$equipo);
            }
            $i++;
        }
        return $listado;
    }

    public function habilitarSinJugador(Request $request,$id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->HABILITADO = $request->HABILITADO;
        $inscripcion->save();
        return $inscripcion;
    }

    public function obtenerHabilitado()
    {
        $lista = Inscripcion::where("HABILITADO","Habilitado")->where("PAGOMEDIO","Completo")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;/*
        while($i<count($lista)){
            $idInscripcion =Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('IDINSCRIPCION');
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $comprobanteCompleto = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEMEDIO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $logo = $equipo->LOGO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> LOGO = $logo;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            $equipoDelegado -> COMPROBANTECOMPLETO = $comprobanteCompleto;
            $equipoDelegado -> IDINSCRIPCION = $idInscripcion;

            array_push($listado,$equipoDelegado);
            $i++;
        }*/
        return $lista;
    }

    public function obtenerHabilitadoSin()
    {
        $lista = Inscripcion::where("HABILITADO","SinJugador")->where("PAGOMEDIO","Completo")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $comprobanteCompleto = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEMEDIO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $logo = $equipo->LOGO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> LOGO = $logo;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            $equipoDelegado -> COMPROBANTECOMPLETO = $comprobanteCompleto;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }

    public function obtenerPagoCompleto()
    {
        $lista = Inscripcion::where("PAGOMEDIO","Completo") -> where("HABILITADO","false") ->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $idInscripcion =Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('IDINSCRIPCION');
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $comprobanteCompleto = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEMEDIO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $logo = $equipo->LOGO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> LOGO = $logo;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            $equipoDelegado -> COMPROBANTECOMPLETO = $comprobanteCompleto;
            $equipoDelegado -> IDINSCRIPCION = $idInscripcion;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }

    public function obtenerEquipos ($id)
    {
        $lista = Inscripcion::where("HABILITADO","HabilitadoCompleto")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->where('CATEGORIA',$id)->first();
            if ($equipo!== null){
                array_push($listado,$equipo);
            }

            $i++;
        }
        return $listado;
    }

    public function obtenerMedioPago()
    {
        $lista = Inscripcion::where("PAGOMEDIO","Medio")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $logo = $equipo -> LOGO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> LOGO = $logo;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }
    public function comprobantePago(Request $request, $id)
    {
        $file = $request->file("imagen");
        $nombre = "cp".time().".".$file->extension();
        $file->storeAs("", $nombre,'public');

        $inscripcion = Inscripcion::where("IDEQUIPO",$id)->first();
        $inscripcion->COMPROBANTEPAGO = $nombre;
        /* $inscripcion->PAGOMEDIO = "COMPLETO"; */
        $inscripcion->save();
        return \response()->json(["res"=> true, "message"=>"imagen cargada"]);
    }

    public function comprobantePagoMedio(Request $request, $id)
    {
        $file = $request->file("imagen");
        $nombre = "CPM".time().".".$file->extension();
        $file->storeAs("", $nombre,'public');

        $inscripcion = Inscripcion::where("IDINSCRIPCION",$id)->first();
        $inscripcion->COMPROBANTEMEDIO = $nombre;
        $inscripcion->PAGOMEDIO = "Completo";
        $inscripcion->save();
        return \response()->json(["res"=> true, "message"=>"imagen cargada"]);

    }
}



