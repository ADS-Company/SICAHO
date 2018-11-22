<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Programa_educativo;

class Profesor_compartido extends Model
{
     //se especifica el nombre de la tabla
    protected $table='profesor_compartido';
    
     //obtiene los datos del profesor ya que al el pertenece por id_profesor
    public function programaEducativo(){
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
}