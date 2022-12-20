<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoDelegado extends Model
{
    use HasFactory;
    protected $fillable = ["NOMBRE", "NOMBREEQUIPO","CI","EMAIL","CELULAR","FECHANACIMIENTO","NACIONALIDAD","GENERO","SIGLAS","","CANTIDAD","FECHACREACION","CATEGORIA","COMPROBANTE","COMPROBANTECOMPLETO","IDINSCRIPCION","LOGO","IDEQUIPO"
    ];
}
