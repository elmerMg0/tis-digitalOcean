<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbitro extends Model
{
    use HasFactory;
    protected $table="Arbitro";
    protected $primaryKey="IDARBITRO";
    protected $fillable = [
        "IDARBITRO",
        "NOMBRE",
        "CI",
        "EMAIL",
        "CELULAR",
        "FECHANACIMIENTO",
        "NACIONALIDAD",
        "GENERO",
        "CONTRASENA"];

        public $incrementing = false;
        protected $keyType = 'string';
    public $timestamps = false;
}
