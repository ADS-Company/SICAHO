<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorCompartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor_compartido', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->increments('id')->unsigned()->nullable();
            $table->string('nombre');
            $table->string('clave')->unique();
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('tipoProfesor');
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
        Schema::dropIfExists('profesor_compartido');
    }
}
