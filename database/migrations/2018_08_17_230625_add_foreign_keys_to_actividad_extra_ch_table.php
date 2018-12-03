<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToActividadExtraChTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividad_extra_ch', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            /*Modifica y agrega la llave id_actividad_extra foranea a la tabla actividad_extra_ch*/
            $table->integer('id_actividad_extra')->unsigned()->nullable();
            $table->foreign('id_actividad_extra')->references('id')->on('actividad_extra')->onDelete('set null');
            /*Modifica y agrega la llave id_carga_horaria foranea a la tabla actividad_extra_ch*/
            $table->integer('id_carga_horaria')->unsigned()->nullable();
            $table->foreign('id_carga_horaria')->references('id')->on('carga_horaria')->onDelete('cascade');
            /*Modifica y agrega la llave id_programa_educativo foranea a la tabla actividad_extra_ch*/
            $table->integer('id_programa_educativo')->unsigned()->nullable();
            $table->foreign('id_programa_educativo')->references('id')->on('programa_educativo')->onDelete('set null');
            /*Modifica y agrega la llave id_especialidad foranea a la tabla actividad_extra_ch*/
            $table->integer('id_especialidad')->unsigned()->nullable();
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('set null');
            /*Modifica y agrega la llave id_cuatrimestre foranea a la tabla actividad_extra_ch*/
            $table->integer('id_cuatrimestre')->unsigned()->nullable();
            $table->foreign('id_cuatrimestre')->references('id')->on('cuatrimestre')->onDelete('set null');
             $table->integer('id_carga_horaria_compartido')->unsigned()->nullable();
            $table->foreign('id_carga_horaria_compartido')->references('id')->on('carga_horaria_compartido')->onDelete('set null');
             /*Modifica y agrega la llave id_compartido foranea a la tabla programa_educativo*/
            $table->integer('id_compartido')->unsigned()->nullable();
            $table->foreign('id_compartido')->references('id')->on('compartido')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividad_extra_ch', function (Blueprint $table) {
             /*hace un drop a la llave foranea id_actividad_extra
            si es que ya existe*/
            $table->dropForeign('id_actividad_extra');
            $table->dropColumn('id_actividad_extra');
            /*hace un drop a la llave foranea id_carga_horaria
            si es que ya existe*/
            $table->dropForeign('id_carga_horaria');
            $table->dropColumn('id_carga_horaria');
            /*hace un drop a la llave foranea id_programa_educativo
            si es que ya existe*/
            $table->dropForeign('id_programa_educativo');
            $table->dropColumn('id_programa_educativo');
            /*hace un drop a la llave foranea id_
            si es que ya existe*/
            $table->dropForeign('id_especialidad');
            $table->dropColumn('id_especialidad');
            /*hace un drop a la llave foranea id_cuatrimestre
            si es que ya existe*/
            $table->dropForeign('id_cuatrimestre');
            $table->dropColumn('id_cuatrimestre');
             /*hace un drop a la llave foranea id_carga_horaria_compartido
            si es que ya existe*/
            $table->dropForeign('id_carga_horaria_compartido');
            $table->dropColumn('id_carga_horaria_compartido');
            /*hace un drop a la llave foranea id_compartido
            si es que ya existe*/
            $table->dropForeign('id_compartido');
            $table->dropColumn('id_compartido');
        });
    }
}
