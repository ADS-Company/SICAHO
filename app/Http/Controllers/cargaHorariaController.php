<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Carga_horaria;
use App\Profesor;
use App\Actividad_extra_ch;  
use App\Asignacion_horas_profesor;
use App\Cuatrimestre_especialidad;
use App\Profesor_compartido;
use App\Programa_educativo;
use App\Asignatura_cuatrimestre;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;


class cargaHorariaController extends Controller
{
    public function index(){
        //Se guarda en la variable car Todos los programas educativos 
        $car = DB::table('programa_educativo')->paginate(10);
        //Se hace una consulta solo a la carrera de tics y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $tics=Programa_educativo::where('nombreProgramaEducativo','Tecnologías de la Información y Comunicación')->first();
        $cargaHorariaTics=$tics->cargashorarias()->paginate(10);
        //Se hace una consulta solo a la carrera de Meca y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $meca=Programa_educativo::where('nombreProgramaEducativo','Mecatrónica')->first();
        $cargaHorariaMeca=$meca->cargashorarias()->paginate(10);
        
        //Se hace una consulta solo a la carrera de mantenimiento y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $mantenimiento=Programa_educativo::where('nombreProgramaEducativo','Mantenimiento Industrial')->first();
        $cargaHorariaMentenimiento=$mantenimiento->cargashorarias()->paginate(10);

        //Se hace una consulta solo a la carrera de industrial y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $industrial=Programa_educativo::where('nombreProgramaEducativo','Ingeniería Industrial')->first();
        $cargaHorariaIndustrial=$industrial->cargashorarias()->paginate(10);

        //Se hace una consulta solo a la carrera de alimetos y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $alimetos=Programa_educativo::where('nombreProgramaEducativo','Procesos Bioalimentarios')->first();
        $cargaHorariaAlimentos=$alimetos->cargashorarias()->paginate(10);

        //Se hace una consulta solo a la carrera de conta y se una a la table de carga horaria  mediante hasMany en el modelo de Programa_educativo
        $conta=Programa_educativo::where('nombreProgramaEducativo','Finanzas y Fiscal Contador Público')->first();
        $cargaHorariaConta=$conta->cargashorarias()->paginate(10);

        //Se hace una consulta solo a la carrera de negocios y se una a la table de carga horaria  mediante hasMany en el modelo de Programa_educativo
        $negocios=Programa_educativo::where('nombreProgramaEducativo','Negocios y Gestión Empresarial')->first();
        $cargaHorariaNegocios=$negocios->cargashorarias()->paginate(10);  

        //Se hace una consulta solo a la carrera de gestionEnpresarial y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $gestionEnpresarial=Programa_educativo::where('nombreProgramaEducativo','Gestión de Proyectos')->first();
        $cargaHorariaGestionE=$gestionEnpresarial->cargashorarias()->paginate(10);

        //Se hace una consulta solo a la carrera de agricultura y se una a la table de carga horaria  mediante hasMany en el modelo de Programa_educativo
        $agricultura=Programa_educativo::where('nombreProgramaEducativo','Agricultura Sustentable y Protegida')->first();
        $cargaHorariaAgricultura=$agricultura->cargashorarias()->paginate(10);
       

    	return view('modulos.cargaHoraria.main', compact('car','tics','meca','mantenimiento','industrial','alimetos','conta','negocios','gestionEnpresarial','agricultura','cargaHorariaTics','cargaHorariaMeca','cargaHorariaIndustrial','cargaHorariaMentenimiento','cargaHorariaAlimentos','cargaHorariaConta','cargaHorariaNegocios','cargaHorariaGestionE','cargaHorariaAgricultura'));
    }
    public function indexD(){
        $carrera=Auth::user()->estado;
        //dd($carrera);
        switch ($carrera) {
            case 'TIC':
                $tics=Programa_educativo::where('nombreProgramaEducativo','Tecnologías de la Información y Comunicación')->first();
                $cargahoraria= $tics->cargashorarias()->get();
                $profesor=$cargahoraria;
                //dd($profesor);
                break;
            case 'MECATRÓNICA':
                $meca=Programa_educativo::where('nombreProgramaEducativo','Mecatrónica')->first();
                $cargahoraria= $meca->cargashorarias()->get();
                $profesor=$cargahoraria;
                break;
            default:
                # code...
                break;
        }
        return view('perfilDirector.cargaHoraria.main', compact('carrera','profesor'));
    }
}
