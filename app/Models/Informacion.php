<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;
    protected $table = "Informacion";
    protected $fillable = [
            "TITULO",
            "NOMBREFOTO"
    ] ;
    public $timestamps = false;
}
