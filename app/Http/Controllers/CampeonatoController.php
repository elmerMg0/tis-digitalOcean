<?php

namespace App\Http\Controllers;
use App\Models\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function mostrar()
    {
        return Campeonato::get();
    }
    public function updatePagos(Request $request, $id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $campeonato->PAGOMITAD = $request->PAGOMITAD;
        $campeonato->PAGOCOMPLETO = $request->PAGOCOMPLETO;
        $campeonato->save();
        return $campeonato;
    }

    public function updateFechas(Request $request, $id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $campeonato->INIPREINSCRIPCION = $request->INIPREINSCRIPCION;
        $campeonato->FINPREINSCRIPCION = $request->FINPREINSCRIPCION;
        $campeonato->INIINSCRIPCION =$request->INIINSCRIPCION;
        $campeonato->FININSCRIPCION =$request->FININSCRIPCION;
        $campeonato->INICIOLIGA = $request->INICIOLIGA;
        $campeonato->FINLIGA = $request->FINLIGA;
        $campeonato->save();
        return $campeonato;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $campeonato = Campeonato::find($id);
        $campeonato->update($input);

        return \response()->json(["res" => false,"message" => "modificado correctamente"],200);
    }

    public function store(Request $request)
    {
        $campeonato = new Campeonato;
        $campeonato ->IDCAMPEONATO=$request->IDCAMPEONATO;
        $campeonato ->DESCRIPCION=$request->DESCRIPCION;
        $campeonato->INIPREINSCRIPCION = $request->INIPREINSCRIPCION;
        $campeonato->FINPREINSCRIPCION = $request->FINPREINSCRIPCION;
        $campeonato->INIINSCRIPCION =$request->INIINSCRIPCION;
        $campeonato->FININSCRIPCION =$request->FININSCRIPCION;
        $campeonato->INICIOLIGA = $request->INICIOLIGA;
        $campeonato->FINLIGA = $request->FINLIGA;
        $campeonato->PAGOMITAD = $request->PAGOMITAD;
        $campeonato->PAGOCOMPLETO = $request->PAGOCOMPLETO;
        $campeonato->save();
        return $campeonato;
    }

    public function pagoMedio(Request $request, $id){
        $file = $request->file("imagen");
        $nombre = "cpm".time().".".$file->extension();
        $file->storeAs("",$nombre,'public');
        $campeonato = Campeonato::where("IDCAMPEONATO",$id)->first();
        $campeonato->PAGOMITAD = $nombre;
        $campeonato->save();

        return \response()->json(["res"=> true, "message"=>"imagen cargaga"]);
    }

    public function pagoCompleto(Request $request, $id){
        $file = $request->file("imagen");
        $nombre = "cpc".time().".".$file->extension();
        $file->storeAs("",$nombre,'public');
        $campeonato = Campeonato::where("IDCAMPEONATO",$id)->first();
        $campeonato->PAGOCOMPLETO = $nombre;
        $campeonato->save();

        return \response()->json(["res"=> true, "message"=>"imagen cargaga"]);
    }

}