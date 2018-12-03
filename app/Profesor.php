<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
     //se especifica el nombre de la tabla
    protected $table='profesor';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clave', 'nombre', 'apellidoPaterno','apellidoMaterno','tipoProfesor',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '', '',
    ];
      public function cargaHorariaProfesor(){
        return $this->hasMany(Carga_horaria::class,'id_profesor');
    }

    public function programaEducativo(){
        return $this->belongsTo(Programa_educativo::class,'id_programa_educativo');
    }
}
