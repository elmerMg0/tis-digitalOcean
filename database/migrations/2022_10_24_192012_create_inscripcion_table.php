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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();

            $table->string("comprobantePago");
            $table->boolean("pagoMedioUno");
            $table->boolean("pagoMedioDos");
            $table->boolean("pagoEntero");

            $table->unsignedBigInteger("equipo_id");
            $table->foreign("equipo_id")->references('id')->on('equipos')
                                        ->onUpdate('cascade')
                                         ->onDelete('cascade');

            $table->unsignedBigInteger("campeonato_id");
            $table->foreign("campeonato_id")->references('id')->on('campeonatos')
                                         ->onUpdate('cascade')
                                         ->onDelete('cascade');

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
        Schema::dropIfExists('inscripciones');
    }
};
