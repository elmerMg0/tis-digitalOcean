<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    public function show (){
        return Categoria::all();
    }

    public function obtenerNombreCategoria () {
        return Categoria::pluck('IDCATEGORIA');
    }

    public function eliminar($id){
        $categoria = Categoria::where("NOMBRECATEGORIA",$id);
        $categoria->delete();
        return "borro";
    }

    public function existe($id)
    {
        return Categoria::where("NOMBRECATEGORIA",$id) -> get();

    }

    public function store(Request $request)
    {
        $categoria = new Categoria;
        $categoria -> IDCATEGORIA=$request->IDCATEGORIA;
        $categoria ->NOMBRECATEGORIA=$request->NOMBRECATEGORIA;
        $categoria ->EDADMIN=$request->EDADMIN;
        $categoria->EDADMAX = $request->EDADMAX;
        $categoria->save();
        return $categoria;
    }
}
