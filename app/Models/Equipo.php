<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = "Equipo";
    protected $primaryKey = "IDEQUIPO";
    protected $fillable = [
            "IDEQUIPO",
            "NOMBRE",
            "SIGLAS",
            "LOGO",
            "CANTIDAD",
            "FECHACREACION",
            "IDDELEGADO",
            "CATEGORIA",
            "PUNTOS",
            "PUESTO",
    ];
    public $timestamps = false;

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class,"IDINSCRIPCION");
    }
}
