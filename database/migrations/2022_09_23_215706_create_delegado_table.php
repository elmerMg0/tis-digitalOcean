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
        Schema::create('delegados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->string('ci');
            $table->string('email');
            $table->bigInteger('celular');
            $table->date('fechaNacimiento');
            $table->string('nacionalidad');
            $table->string('genero');
            $table->string("api_token")->nullable();
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
        Schema::dropIfExists('delegados');
    }
};
