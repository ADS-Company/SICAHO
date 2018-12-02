<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
//modelos de la base de datos
use App\Especialidad;
use App\Asignatura;
use App\Cuatrimestre_especialidad;
use App\Cuatrimestre;
use App\Asignatura_cuatrimestre;
class ProgramaEducativoController extends Controller
{
    //
    public function getEspecialidades(){
        /*trae la variable id_programa_educativo que se le pasa por el archivo scriptCombobox
        donde recibe del select programaEducativo*/ 
        $id_programa_educativo= Input::get('id_programa_educativo');
       //hace una consulta con condicion y regresa una colección de datos que se asignan a $especialidades
        $especialidades=Especialidad::where('id_programa_educativo',$id_programa_educativo)->get();
        //regresa una respuesta de tipo json con un arreglo que contiene la colección de datos 
        return response()->json($especialidades);
    }
    
    public function getCuatrimestres(){
        /*trae la variable id_especialidad que se le pasa por el archivo scriptCombobox
        donde recibe del select especialidad*/ 
        $id_especialidad= Input::get('id_especialidad');
        //encuentra el regitro y lo asigna al objeto especialidad
        $especialidad=Especialidad::find($id_especialidad);
        //asigna a la variable $cuatrimestres una collección de los registros relacionados con especialidad
        $cuatrimestres=$especialidad->cuatrimestres()->get();
        //regresa una respuesta de tipo json con un arreglo que contiene la colección de datos 
        return response()->json($cuatrimestres);
    }
    
    public function getAsignaturas(){
        /*trae la variable id_cuatrimestre que se le pasa por el archivo scriptCombobox
        donde recibe del select cuatrimestre*/ 
        $id_cuatrimestre= Input::get('id_cuatrimestre');
        /*trae la variable id_especialidad que se le pasa por el archivo scriptCombobox
        donde recibe del select especialidad*/ 
         $id_especialidad= Input::get('id_especialidad');
        //hace una consulta con las condiciones en el where y le asigna esa colección a $asignaturas
        $asignaturas=Asignatura::where('id_cuatrimestre',$id_cuatrimestre)->where('id_especialidad',$id_especialidad)->get();
        //regresa una respuesta de tipo json con un arreglo que contiene la colección de datos 
        return response()->json($asignaturas);
    }
    
     public function getEspecialidadesC(){
        /*trae la variable id_programa_educativo que se le pasa por el archivo scriptCombobox
        donde recibe del select programaEducativo*/ 
        $id_programa_educativo= Input::get('id_programa_educativo');
       //hace una consulta con condicion y regresa una colección de datos que se asignan a $especialidades
        $especialidades=Especialidad::where('id_programa_educativo',$id_programa_educativo)->get();
        //regresa una respuesta de tipo json con un arreglo que contiene la colección de datos 
        return response()->json($especialidades);
    }
    
    public function getCuatrimestresC(){
        /*trae la variable id_especialidad que se le pasa por el archivo scriptCombobox
        donde recibe del select especialidad*/ 
        $id_especialidad= Input::get('id_especialidad');
        //encuentra el regitro y lo asigna al objeto especialidad
        $especialidad=Especialidad::find($id_especialidad);
        //asigna a la variable $cuatrimestres una collección de los registros relacionados con especialidad
        $cuatrimestres=$especialidad->cuatrimestres()->get();
        //regresa una respuesta de tipo json con un arreglo que contiene la colección de datos 
        return response()->json($cuatrimestres);
    }
    
    public function getAsignaturasC(){
        /*trae la variable id_cuatrimestre que se le pasa por el archivo scriptCombobox
        donde recibe del select cuatrimestre*/ 
        $id_cuatrimestre= Input::get('id_cuatrimestre');
        /*trae la variable id_especialidad que se le pasa por el archivo scriptCombobox
        donde recibe del select especialidad*/ 
         $id_especialidad= Input::get('id_especialidad');
        //hace una consulta con las condiciones en el where y le asigna esa colección a $asignaturas
        $asignaturas=Asignatura::where('id_cuatrimestre',$id_cuatrimestre)->where('id_especialidad',$id_especialidad)->get();
        //regresa una respuesta de tipo json con un arreglo que contiene la colección de datos 
        return response()->json($asignaturas);
    }
}
