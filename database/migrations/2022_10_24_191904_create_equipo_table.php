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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();

            $table->string("nombre")->unique();
            $table->string("siglas");
            $table->string("logo",100);
            $table->integer("cantidad");
            $table->date("fechaCreacion");
         

            $table->unsignedBigInteger("delegado_id");
            $table->foreign('delegado_id')->references('id')->on('delegados');


            $table->unsignedBigInteger("categoria_id");
            $table->foreign('categoria_id')->references('id')->on('categorias')
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
        Schema::dropIfExists('equipos');
    }
};
