<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga_horaria extends Model
{
     //se especifica el nombre de la tabla
    protected $table='carga_horaria';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'horasTotales', 
        'horasDisponibles', 
        'id_profesor',
        'id_actividad_extra_ch',
        'id_asignacion_horas_profesor',
        'id_Cuatrimestre_especialidad',
        'id_profesor_compartido'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '', '',
    ];
    //obtiene los datos del profesor ya que al el pertenece por id_profesor
    public function profesor(){
        return $this->belongsTo(Profesor::class,'id_profesor');
    }
    //obtiene los datos del programaEdcuativo ya que a el pertenece por id_programa_educativo
    public function programaEducativo(){
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
    public function cuatrimestreEspecialidad(){
        return $this->belongsTo(Cuatrimestre_especialidad::class);
    }
    //obtiene todas las asignaciones de horas pertenecientes a la carga horaria
    public function asignacionAsignaturas(){
        return $this->hasMany(Asignacion_horas_profesor::class,'id_carga_horaria');
    }
    //obtiene todas las actividades extra pertenecientes a la carga horaria
    public function actividadesExtra(){
        return $this->hasMany(Actividad_extra_ch::class,'id_carga_horaria');
    }
    public function profesoresCH(){ 
        return $this->belongsTo(Profesor::class,'id_profesor');
    }
}
