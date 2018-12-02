<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Progama_educativo;
use App\Profesor_compartido;
class Compartido extends Model
{
      //se especifica el nombre de la tabla
    protected $table='compartido';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'horas_cedidas', 
        'horas_disponibles', 
        'id_profesor_comaprtido',
        'id_programa_educativo',
    ];
    
    //obtiene los datos del profesor ya que al el pertenece por id_profesor
    public function programaEducativo(){
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
    //obtiene los datos del profesor ya que al el pertenece por id_profesor
    public function profesor(){
        return $this->belongsTo(Profesor_compartido::class,'id_profesor_compartido');
    }
}
