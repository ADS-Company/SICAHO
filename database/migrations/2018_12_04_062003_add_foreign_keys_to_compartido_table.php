<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCompartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compartido', function (Blueprint $table) {
            $table->engine = 'InnoDB';
             /*Modifica y agrega la llave id_profesor_compartido foranea a la tabla profesor compartido*/
             $table->integer('id_profesor_compartido')->unsigned()->nullable();
            $table->foreign('id_profesor_compartido')->references('id')->on('profesor_compartido')->onDelete('cascade');
            /*Modifica y agrega la llave id_profesor_compartido foranea a la tabla profesor compartido*/
            $table->integer('id_programa_educativo')->unsigned()->nullable();
            $table->foreign('id_programa_educativo')->references('id')->on('programa_educativo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compartido', function (Blueprint $table) {
           /*hace un drop a la llave foranea id_profesor_compartido
            si es que ya existe*/
            $table->dropForeign('id_profesor_compartido');
            $table->dropColumn('id_profesor_compartido');
            /*hace un drop a la llave foranea id_programa_educativo
            si es que ya existe*/
            $table->dropForeign('id_programa_educativo');
            $table->dropColumn('id_programa_educativo');
        });
    }
}
