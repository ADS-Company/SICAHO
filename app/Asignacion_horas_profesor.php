<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_horas_profesor extends Model
{
    //se especifica el nombre de la tabla
    protected $table='asignacion_horas_profesor';
    //los datos que se pueden llenar 
    protected $fillable = [
        'id_carga_horaria', 'id_asignatura', 'id_especialidad','id_cuatrimestre','id_programa_educativo',
    ];
    
    //método que hace referencia a el modelo carga horaria para indicar su pertenecia 
    public function cargaHoraria(){
        return $this->belongsTo(Carga_horaria::class,'id_carga_horaria');
    }
    //método que hace referencia a el modelo programa educativo para indicar su pertenecia  
    public function programaEducativo(){
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
    //método que hace referencia a el modelo especialidad para indicar su pertenecia  
    public function especialidad(){
        return $this->belongsTo(Especialidad::class,'id_especialidad');
    }
    //método que hace referencia a el modelo cuatrimestre para indicar su pertenecia  
    public function cuatrimestre(){
        return $this->belongsTo(Cuatrimestre::class,'id_cuatrimestre');
    }
    //método que hace referencia a el modelo asignatura para indicar su pertenecia  
    public function asignatura(){
        return $this->belongsTo(Asignatura::class,'id_asignatura');
    }
}
