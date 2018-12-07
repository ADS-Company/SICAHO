<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
     //se especifica el nombre de la tabla
    protected $table='especialidad';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_programa_educativo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '', '',
    ];
    //método que hace referencia al modelo programaEducativo
    public function programaEducativo(){
        //retorna un método de pertenencia a programa educativo 
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
    //método que regresa una lista de los programas educativos
    public function especialidades($id){
        return Especialidad::where('id_programa_educativo',$id)->get();
    }
    
    public function cuatrimestres(){
        return $this->belongsToMany(Cuatrimestre::class,'cuatrimestre_especialidad','id_especialidad','id_cuatrimestre');
    }
    
    public function cargasHorarias(){
        return $this->belongsToMany(Carga_horaria::class,'cuatrimestre_especialidad','id_especialidad','id_carga_horaria');
    }
}
