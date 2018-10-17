<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa_educativo extends Model
{
     //se especifica el nombre de la tabla
    protected $table='programa_educativo';
    
     public function especialidad(){
    	return $this->hasMany(Especialidad::class,'id_programa_educativo');
    }

    public function cargashorarias(){
    	return $this->hasMany(Carga_horaria::class,'id_programa_educativo');
    }
}
