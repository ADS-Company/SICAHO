<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad_extra_ch extends Model
{
   //se especifica el nombre de la tabla
    protected $table='actividad_extra_ch';
    
     //los datos que se pueden llenar 
    protected $fillable = [
        'id_carga_horaria', 'id_actividad_extra', 'id_especialidad','id_cuatrimestre','id_programa_educativo','horasSemanales','horasCuatrimestrales',
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
    //método que hace referencia a el modelo actividad extra para indicar su pertenecia  
    public function actividadExtra(){
        return $this->belongsTo(Actividad_extra::class,'id_actividad_extra');
    }
}
