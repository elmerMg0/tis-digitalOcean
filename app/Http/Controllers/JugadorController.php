<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Inscripcion;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Imports\JugadorImport;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class JugadorController extends Controller
{
    public function store(Request $request)
    {
        $jugador = new Jugador;
        $jugador->IDJUGADOR=$request->IDJUGADOR;
        $jugador->IDEQUIPO=$request->IDEQUIPO;
        $jugador->NOMBREJUGADOR=$request->NOMBREJUGADOR;
        $jugador->CIJUGADOR=$request->CIJUGADOR;
        $jugador->CELULAR=$request->CELULAR;
        $jugador->EMAIL=$request->EMAIL;
        $jugador->FOTOCIJUGADOR=$request->FOTOCIJUGADOR;
        $jugador->ROL=$request->ROL;
        $jugador->FOTOJUGADOR=$request->FOTOJUGADOR;
        $jugador->FECHANACIMIENTO=$request->FECHANACIMIENTO;
        $jugadores = Jugador::where("IDEQUIPO",$request->IDEQUIPO)->get();
        $equipo = Equipo::where("IDEQUIPO",$request->IDEQUIPO)->first();
        $cantAct = sizeof($jugadores);
        $cantMax = $equipo->CANTIDAD;
        
        $nombreQr = $request->IDJUGADOR.time().".svg";
        $inforJugador = $request->NOMBREJUGADOR." ".$request->CIJUGADOR." ".$equipo->NOMBRE;
        QrCode::generate($inforJugador,'../public/qrJugadores/'.$nombreQr);
        $jugador->FOTOQR= $nombreQr;
        $jugador->save();
        
        if($cantAct == $cantMax){
            $inscripcion = Inscripcion::where("IDEQUIPO",$id)->first();              
            $inscripcion->HABILITADO = "habilitado";
            $inscripcion->save();
        }
        return $jugador;
    }


    public function show()
    {
        return Jugador::get();
    }

    public function setImgCi(Request $request, $id){
        //$path = $request->file('imagen')->store('');
        $file = $request->file("imagen");
        $nombre = "ci".time().".".$file->extension();
        $file->storeAs("", $nombre,'public');
        
        $jugador = Jugador::where("CIJUGADOR",$id)->first();
        $jugador->FOTOCIJUGADOR = $nombre;
        $jugador->save();     
        //return $path;   
        return $nombre;
    }

    public function setImgJugador(Request $request, $id){
        $file = $request->file("imagen");
        $nombre = "pic".time().".".$file->extension();
        $file->storeAs("", $nombre,'public');
        
        $jugador = Jugador::where("CIJUGADOR",$id)->first();
        $jugador->FOTOJUGADOR = $nombre;
        $jugador->save();     
        return $nombre;
    }
   public function actualizarJugador(Request $request , $ci){
        $jugador = Jugador::where("CIJUGADOR", $ci)->first();
        $jugador->NOMBREJUGADOR=$request->NOMBREJUGADOR;
        $jugador->CIJUGADOR=$request->CIJUGADOR;
        $jugador->CELULAR=$request->CELULAR;
        $jugador->EMAIL=$request->EMAIL;
        $jugador->FOTOCIJUGADOR=$request->FOTOCIJUGADOR;
        $jugador->ROL=$request->ROL;
        $jugador->FOTOQR=$request->FOTOQR;
        $jugador->FOTOJUGADOR=$request->FOTOJUGADOR;
        $jugador->FECHANACIMIENTO=$request->FECHANACIMIENTO;
        $jugador->save();
        return $jugador;
   }

   public function eliminarJugador ($id){
        $jugador = Jugador::where("CIJUGADOR",$id);
        $jugador->delete();
        return 1;
   }

   public function addJugadoresExcel(Request $request, $id){
    $this->eliminarJugadores($id);
    $equipo = Equipo::where("IDEQUIPO",$id)->first(); 
    if( ! empty($id)){
        $datos = Excel::import(new JugadorImport($id, $equipo->CANTIDAD),request()->file('file'));
    }
    $inscripcion = Inscripcion::where("IDEQUIPO",$id)->first();
    $inscripcion->HABILITADO = "habilitado";
    $inscripcion->save();
    return \response()->json(["res"=> true, "datos"=> $datos]);
    }

    public function eliminarJugadores($idEquipo){
        $jugadores = Jugador::where("IDEQUIPO",$idEquipo)->get();
        $res = sizeof($jugadores);
        if($res !== 0){
            for($i = 0; $i < $res ; $i++){
                $jugadores[$i]->delete();
            }
            return $jugadores;
        }
    }

    public function obtenerJugadores($id){
        $jugadores = Jugador::where("IDEQUIPO",$id)->get();
        return $jugadores;
    }

    public function obtenerJugadoresQr($idEquipo){
        /* $jugadores = Jugador::where("IDEQUIPO",$idEquipo)->get();
        for($i = 0; $i < sizeof($jugadores); $i++){

        } */
        $nombre = "qr".time().".svg";
        $jugador = "Elmer Mendoza";
        $equipo = "Lakers";
        $inforJugador = $jugador." ".$equipo." "."Habilitado";
         QrCode::generate($inforJugador,'../public/qrJugadores/'.$nombre);
    }
}