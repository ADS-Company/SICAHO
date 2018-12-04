<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCargaHorariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carga_horaria', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            /*Modifica y agrega la llave id_profesor foranea a la tabla carga_horaria*/
            $table->integer('id_profesor')->unsigned()->nullable();
            $table->foreign('id_profesor')->references('id')->on('profesor')->onDelete('cascade');      
            /*Modifica y agrega la llave id_programa_educativo foranea a la tabla carga_horaria*/
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
        Schema::table('carga_horaria', function (Blueprint $table) {
            /*hace un drop a la llave foranea id_profesor
            si es que ya existe*/
            $table->dropForeign('id_profesor');
            $table->dropColumn('id_profesor');
            /*hace un drop a la llave foranea id_profesor_compartido
            si es que ya existe*/
            $table->dropForeign('id_programa_educativo');
            $table->dropColumn('id_programa_educativo');
        });
    }
}
