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

class catalogoController extends Controller
{
    public function index(){
    	//Se guarda en la variable car Todos los programas educativos
    	$car = DB::table('programa_educativo')->get();

        //Se hace una consulta solo a la carrera de tics y se una a la table de carga horaria mediante hasMany en el modelo de Programa_educativo
        $tics=Programa_educativo::where('nombreProgramaEducativo','Tecnologías de la Información y Comunicación')->first();
        $cargaHorariaTics=$tics->cargashorarias()->get();
        $meca=Programa_educativo::where('nombreProgramaEducativo','Mecatrónica')->first();
        $cargaHorariaMeca=$meca->cargashorarias()->get();

    
        $industrial=Programa_educativo::where('nombreProgramaEducativo','Ingeniería Industrial')->first();
        $cargaHorariaIndustrial=$industrial->cargashorarias()->get();

    	$negocios=Programa_educativo::where('nombreProgramaEducativo','Negocios y Gestión Empresarial')->first();
    	$cargaHorariaNegocios=$negocios->cargashorarias()->get();

        $gestionEnpresarial=Programa_educativo::where('nombreProgramaEducativo','Gestión de Proyectos')->first();
        $cargaHorariaTGestionE=$gestionEnpresarial->cargashorarias()->get();

        $alimentos=Programa_educativo::where('nombreProgramaEducativo','Procesos Bioalimentarios')->first();
        $cargaHorariaAlimentos=$alimentos->cargashorarias()->get();

        $mantenimiento=Programa_educativo::where('nombreProgramaEducativo','Mantenimiento Industrial')->first();
        $cargaHorariaMantenimiento=$mantenimiento->cargashorarias()->get();

        $conta=Programa_educativo::where('nombreProgramaEducativo','Finanzas y Fiscal Contador Público')->first();
		$cargaHorariaConta=$conta->cargashorarias()->get();

        $agricultura=Programa_educativo::where('nombreProgramaEducativo','Agricultura Sustentable y Protegida')->first();
        $cargaHorariaAgricultura=$agricultura->cargashorarias()->get();

	    return view('modulos.catalogos.main',compact('cargaHorariaTics','cargaHorariaMeca','cargaHorariaIndustrial','cargaHorariaNegocios','cargaHorariaTGestionE','cargaHorariaAlimentos','cargaHorariaMantenimiento','cargaHorariaConta','cargaHorariaAgricultura','tics','meca','industrial','negocios','gestionEnpresarial','alimentos','mantenimiento','conta','agricultura'));
    }


    public function verCarrera($id){
    	//dd("carrera vista: " . $id);

    	switch ($id) {
    		case '9'://Tic
    			$tics=Programa_educativo::where('nombreProgramaEducativo','Tecnologías de la Información y Comunicación')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaTics=$tics->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',['cargaHorariaTics'=>$cargaHorariaTics,'tics'=>$tics]);
    			break;

    		case '8'://ing industrial
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$indu=Programa_educativo::where('nombreProgramaEducativo','Ingeniería Industrial')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaIndu=$indu->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaIndu','indu'));
    			break;

    		case '7'://Mantenimiento
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$mante=Programa_educativo::where('nombreProgramaEducativo','Mantenimiento Industrial')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaMante=$mante->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaMante','mante'));
    			break;

    		case '6'://Mecatronica
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$meca=Programa_educativo::where('nombreProgramaEducativo','Mecatrónica','meca')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaMeca=$meca->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaMeca','meca'));
    			break;

    		case '5'://Alimentos
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$ali=Programa_educativo::where('nombreProgramaEducativo','Procesos Bioalimentarios')->first();;
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaAli=$ali->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaAli','ali'));
    			break;

    		case '4': //Contabilidad
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$conta=Programa_educativo::where('nombreProgramaEducativo','Finanzas y Fiscal Contador Público')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaConta=$conta->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaConta','conta'));
    			break;

    		case '3'://Negocios
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$neg=Programa_educativo::where('nombreProgramaEducativo','Negocios y Gestión Empresarial')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaNeg=$neg->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaNeg','neg'));
    			break;

    		case '2': //Gestion espresarial
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$gesE=Programa_educativo::where('nombreProgramaEducativo','Gestión de Proyectos')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaGesE=$gesE->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaGesE','gesE'));
    			break;

    		case '1': //Agricultura
    			//Consultas builder para mostrar los profesores de Mecatronica y profesores PTC
				$agri=Programa_educativo::where('nombreProgramaEducativo','Agricultura Sustentable y Protegida')->first();
		        //Une las de Profesores con la cargaHoria
		        $cargaHorariaAgri=$agri->cargashorarias()->get();
		        //Regresa a la vista de ver carreras las variables con la coleccion de datos
				return view('modulos.catalogos.verCarrera',compact('cargaHorariaAgri','agri'));
    			break;

    		default:
    			break;
    	}
    }
}
