<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = "Incripcion";
    protected $primaryKey="IDINSCRIPCION";
    protected $fillable = [
            "IDEQUIPO",
            "COMPROBANTEPAGO",
            "PAGOMEDIO",
            "COMPROBANTEMEDIO",
            "HABILITADO"
    ] ;
    public $timestamps = false;

    public function equipo()
    {
        return $this->belongsTo(Equipo::class,"IDEQUIPO");
    }
}
