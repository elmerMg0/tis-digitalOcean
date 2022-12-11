<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;
    protected $table="Campeonato";
    protected $primaryKey="IDCAMPEONATO";
    protected $fillable = [
        "DESCRIPCION",
        "INIPREINSCRIPCION",
        "FINPREINSCRIPCION",
        "INIINSCRIPCION",
        "FININSCRIPCION",
        "INICIOLIGA",
        "FINLIGA",
        "PAGOMITAD",
        "PAGOCOMPLETO"
    ];

    public $timestamps = false;
    
    public function inscripciones(){
        return $this->hasMany(Inscripcion::class);
    }
}
