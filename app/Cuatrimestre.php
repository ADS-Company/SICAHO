<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuatrimestre extends Model
{
     //se especifica el nombre de la tabla
    protected $table='cuatrimestre';
    
    //método para obtener todos registros relacionados a su cuatrimestre
    public function asignaturas(){
        return $this->hasMany(Asignatura::class,'id_cuatrimestre');
    }
}
