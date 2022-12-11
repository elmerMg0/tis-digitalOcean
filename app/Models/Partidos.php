<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model
{
    use HasFactory;
    protected $primaryKey = "IDPARTIDO";
    protected $table="Partido";
    protected $fillable = [
          "IDCATEGORIA" ,
          "GRUPO",
          "EQUIPO1",
          "EQUIPO2",
          "GANADOR",
          "PERDEDOR",
          "EMPATE",
          "ANOTACIONESEQ1",
          "ANOTACIONESEQ2",
          "LUGAR",
          "HORA",
          "DIA"
    ];
    public $timestamps = false;
}
