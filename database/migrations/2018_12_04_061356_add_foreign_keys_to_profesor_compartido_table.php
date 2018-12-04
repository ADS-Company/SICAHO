<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToProfesorCompartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesor_compartido', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            /*Modifica y agrega la llave id_programa_educativo foranea a la tabla profesor compartido*/
            $table->integer('id_programa_educativo')->unsigned()->nullable();
            $table->foreign('id_programa_educativo')->references('id')->on('programa_educativo')->onDelete('set null');
             /*Modifica y agrega la llave id_carga_horaria foranea a la tabla profesor_compartido*/
            $table->integer('id_carga_horaria')->unsigned()->nullable();
            $table->foreign('id_carga_horaria')->references('id')->on('carga_horaria')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesor_compartido', function (Blueprint $table) {
            /*hace un drop a la llave foranea id_profesor_compartido
            si es que ya existe*/
            $table->dropForeign('id_programa_educativo');
            $table->dropColumn('id_programa_educativo');
            /*hace un drop a la llave foranea id_carga_horaria
            si es que ya existe*/
            $table->dropForeign('id_carga_horaria');
            $table->dropColumn('id_carga_horaria');
        });
    }
}
