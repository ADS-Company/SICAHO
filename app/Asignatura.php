<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
     //se especifica el nombre de la tabla
    protected $table='asignatura';
    //metodo que hace referencia a la pertenencia a programa educativo
    public function programaEducativo(){
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
    //metodo que hace referencia a la pertenencia a especialidad
    public function especialidad(){
        return $this->belongsTo(Especialidad::class,'id_especialidad');
    }
    //metodo que hace referencia a la pertenencia a cuatrimestre
    public function cuatrimestre(){
        return $this->belongsTo(Cuatrimestre::class,'id_cuatrimestre');
    }
}
