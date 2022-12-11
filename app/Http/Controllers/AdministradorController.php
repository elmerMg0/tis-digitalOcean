<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;


class AdministradorController extends Controller
{
    public function obtenerAdministrador($id)
    {
        return Administrador::where("IDADMINISTRADOR",$id)->get();
    }
}
