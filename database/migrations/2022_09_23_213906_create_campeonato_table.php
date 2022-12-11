<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion")->nullable();
            $table->date("iniPreInscripcion");
            $table->date("finPreInscripcion");
            $table->date("iniInscripcion");
            $table->date("finInscripcion");
            $table->date("inicioLiga");
            $table->date("finLiga");
            $table->string("pagoMitad",100);
            $table->string("pagoEntero",100);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campeonatos');
    }
};
