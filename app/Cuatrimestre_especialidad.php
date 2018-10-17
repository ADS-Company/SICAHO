<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuatrimestre_especialidad extends Model
{
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =['id_cuatrimestre','id_especialidad','id_carga_horaria',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '', '',
    ];
     //se especifica el nombre de la tabla
    protected $table='cuatrimestre_especialidad';
    //método que hace referencia al modelo cuatrimestre
    public function cuatrimestre(){
        //regresa un método de pertencia a cuatrimestre 
        return $this->belongsTo(Cuatrimestre::class,'id_cuatrimestre');
    }
    //método que hace referencia al modelo especialidad
    public function especialidad(){
        //regresa un método de pertenencia a especialidad 
        return $this->belongsTo(Especialidad::class,'id_especialidad');
    }
    //método que hace referencia al modelo asignarura
    public function asignaturas(){
        //regresa un método de pertenencia a especialidad 
        return $this->belongsToMany(Asignatura::class,'asignatura_cuatrimestre','id_cuatrimestre_especialidad','id_asignatura');
    }
}
