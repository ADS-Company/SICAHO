<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignatura', function (Blueprint $table) {
             $table->engine = 'InnoDB';
              /*Modifica y agrega la llave id_cuatrimestre foranea a la tabla asignatura_cuatrimestre*/
            $table->integer('id_cuatrimestre')->unsigned()->nullable();
            $table->foreign('id_cuatrimestre')->references('id')->on('cuatrimestre')->onDelete('set null');
             /*Modifica y agrega la llave id_especialidad foranea a la tabla asignatura_cuatrimestre*/
            $table->integer('id_especialidad')->unsigned()->nullable();
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('set null');
            /*Modifica y agrega la llave id_programa_educativo foranea a la tabla asignatura_cuatrimestre*/
            $table->integer('id_programa_educativo')->unsigned()->nullable();
            $table->foreign('id_programa_educativo')->references('id')->on('programa_educativo')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignatura', function (Blueprint $table) {
             /*hace un drop a la llave foranea id_cuatrimestre
            si es que ya existe*/
            $table->dropForeign('id_cuatrimestre');
            $table->dropColumn('id_cuatrimestre');
            /*hace un drop a la llave foranea id_especialidad
            si es que ya existe*/
            $table->dropForeign('id_especialidad');
            $table->dropColumn('id_especialidad');
             /*hace un drop a la llave foranea id_programa_educativo
            si es que ya existe*/
            $table->dropForeign('id_programa_educativo');
            $table->dropColumn('id_programa_educativo');
        });
    }
}
