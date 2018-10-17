<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToAsignacionHorasProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignacion_horas_profesor', function (Blueprint $table) {
             /*Modifica y agrega la llave id_carga_horaria foranea a la tabla profesor compartido*/
            $table->integer('id_carga_horaria')->unsigned()->nullable();
            $table->foreign('id_carga_horaria')->references('id')->on('carga_horaria')->onDelete('cascade');
            /*Modifica y agrega la llave id_asignaturaforanea a la tabla asignatura*/
            $table->integer('id_asignatura')->unsigned()->nullable();
            $table->foreign('id_asignatura')->references('id')->on('asignatura')->onDelete('set null');
             /*Modifica y agrega la llave id_especialidad foranea a la tabla especialidad*/
            $table->integer('id_especialidad')->unsigned()->nullable();
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('set null');
             /*Modifica y agrega la llave id_cuatrimestre foranea a la tabla cuatrimestre*/
            $table->integer('id_cuatrimestre')->unsigned()->nullable();
            $table->foreign('id_cuatrimestre')->references('id')->on('cuatrimestre')->onDelete('set null');
             /*Modifica y agrega la llave id_programa_educativo foranea a la tabla programa_educativo*/
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
        Schema::table('asignacion_horas_profesor', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            /*hace un drop a la llave foranea id_carga_horaria
            si es que ya existe*/
            $table->dropForeign('id_carga_horaria');
            $table->dropColumn('id_carga_horaria');
            /*hace un drop a la llave foranea id_asignatura
            si es que ya existe*/
            $table->dropForeign('id_asignatura');
            $table->dropColumn('id_asignatura');
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
