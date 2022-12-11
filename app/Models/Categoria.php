<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table="Categoria";

    protected $fillable = [
        "IDCATEGORIA",
        "NOMBRECATEGORIA",
        "EDADMIN",
        "EDADMAX"
    ];
    public $timestamps = false;
}
