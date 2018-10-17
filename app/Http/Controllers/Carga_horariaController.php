<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//instacia de los modelos
use App\Profesor;
use App\Carga_horaria;
use App\Asignacion_horas_profesor;
use App\Asignatura_cuatrimestre;
use App\Asignatura;
use App\Actividad_extra_ch;
//instacia para el error de sql
use Illuminate\Database\QueryException; 
class Carga_horariaController extends Controller
{
    //Método para agregar las horas a profesor
    public function agregarHoras(Request $request){
       // try{
            $cargaHoraria = new Carga_horaria;
            $cargaHoraria->horasTotales =$request->input('horasTotales');
            $cargaHoraria->horasDisponibles =$request->input('horasTotales');
            $cargaHoraria->id_profesor = $request->input('idProfesor');
            $cargaHoraria->id_programa_educativo= $request->get('programaEducativo');
            $cargaHoraria->save();
            
            return back()->with('success','Los datos para las horas de profesor se han guardado correctamente');
        //}catch(QueryException $ex){
        //return back()->with('status','Los datos para las horas de profesor no se han guardado correctamente');
       // }
    }
    
    //método para agregar las asignaturas al profesor
    public function agregarAsignacionAsignatura(Request $request){
        //obtiene y asigna el valor que trae del formulario por medio del request
        $idProfesor=$request->input('idProfesor');
        $idProgramaEducativo=$request->get('programaEducativo');
        $idEspecialidad=$request->get('especialidad');
        $idCuatrimestre=$request->get('cuatrimestre');
        $idAsignatura=$request->get('asignatura');
        //busca la asignatura con ese id y lo asigna a el objeto $asignatura
        $asignatura=Asignatura::findOrFail($idAsignatura);
        //obtiene la cantidad de horas y las asigna a la variable $cantHorasSem
        $cantHorasSem=$asignatura->horasSemanales;
        //busca la carga horaria por medio de su id y lo asigna a la variable cargaHoraria
        $cargaHoraria=Carga_horaria::where('id_profesor',$idProfesor)->first();
        //obtiene la cantidad de horas de carga horaria y lo asigna a canHorasDisponibles
        $cantHorasDis=$cargaHoraria->horasDisponibles;
        
        //condición si las horasDisponibles son menor que la cantHorasSem
        if($cantHorasDis<$cantHorasSem){
            return back()->with('status','No hay horas suficientes para la asignatura');
        }else{
            //realiza la operación para restar las horas de la asignatura
            $cantHorasResult=$cantHorasDis-$cantHorasSem;
            //se actualiza la carga horaria del profesor 
            $cargaHoraria->horasDisponibles=$cantHorasResult;
            $cargaHoraria->save();
            //se guarda la asignacion de la asignatura
            $asignacionHoras=new Asignacion_horas_profesor;
            $asignacionHoras->id_carga_horaria=$cargaHoraria->id;
            $asignacionHoras->id_programa_educativo=$idProgramaEducativo;
            $asignacionHoras->id_especialidad=$idEspecialidad;
            $asignacionHoras->id_cuatrimestre=$idCuatrimestre;
            $asignacionHoras->id_asignatura=$idAsignatura;
            $asignacionHoras->save();
            return back()->with('success','Los datos de asignatura se han guardado correctamente');
            
            
        }
    }
    
    //método para eliminar las asignaturas al profesor
    public function eliminarAsignacionAsignatura(Request $request){
        //se obtienen los datos pasados del form por request
        $idProfesor=$request->input('idProfesor');
        $idAsignatura=$request->input('idAsignatura');
        //busca la asignatura con ese id y lo asigna a el objeto $asignatura
        $asignatura=Asignatura::findOrFail($idAsignatura);
        //obtiene la cantidad de horas y las asigna a la variable $cantHorasSem
        $cantHorasSem=$asignatura->horasSemanales;
        //busca la carga horaria por medio de su id y lo asigna a la variable cargaHoraria
        $cargaHoraria=Carga_horaria::where('id_profesor',$idProfesor)->first();
        $idCargaHoraria=$cargaHoraria->id;
        //obtiene la cantidad de horas de carga horaria y lo asigna a canHorasDisponibles
        $cantHorasDis=$cargaHoraria->horasDisponibles;
        //hace la operación para regresarle sus horas a carga horaria
        $cantHorasResult=$cantHorasDis + $cantHorasSem;
        $cargaHoraria->horasDisponibles=$cantHorasResult;
        $cargaHoraria->save();
        //busca la asignacion horas de profesor para eliminar el registro
        $asignaturaProfesor=Asignacion_horas_profesor::where('id_carga_horaria',$idCargaHoraria)->where('id_asignatura',$idAsignatura)->first();
        
        $asignaturaProfesor->delete();
        
        return back()->with('success','Los datos se han eliminado correctamente');
        
    }
    
    //método para agregar las actividades de un profesor
    public function agregarActividadesExtra(Request $request){
        //obtiene y asigna el valor que trae del formulario por medio del request
        $idProfesor=$request->input('idProfesor');
        $idProgramaEducativo=$request->get('programaEducativo');
        $idEspecialidad=$request->get('especialidad');
        $idCuatrimestre=$request->get('cuatrimestre');
        $idActividad=$request->get('actividad');
        $horasSemanales=$request->input('horasSemanales');
        $horasCuatrimestrales=$request->input('horasCuatrimestrales');
        //busca la carga horaria por medio de su id y lo asigna a la variable cargaHoraria
        $cargaHoraria=Carga_horaria::where('id_profesor',$idProfesor)->first();
        //obtiene la cantidad de horas de carga horaria y lo asigna a canHorasDisponibles
        $cantHorasDis=$cargaHoraria->horasDisponibles;
        
        //condición si las horasDisponibles son menor que la cantHorasSem
        if($cantHorasDis<$horasSemanales){
            return back()->with('status','No hay horas suficientes para la asignatura');
        }else{
            //realiza la operación para restar las horas de la asignatura
            $cantHorasResult=$cantHorasDis-$horasSemanales;
            //se actualiza la carga horaria del profesor 
            $cargaHoraria->horasDisponibles=$cantHorasResult;
            $cargaHoraria->save();
            //se guarda la asignacion de la asignatura
            $actividadExtraCH=new Actividad_extra_ch;
            $actividadExtraCH->id_carga_horaria=$cargaHoraria->id;
            $actividadExtraCH->id_programa_educativo=$idProgramaEducativo;
            $actividadExtraCH->id_especialidad=$idEspecialidad;
            $actividadExtraCH->id_cuatrimestre=$idCuatrimestre;
            $actividadExtraCH->id_actividad_extra=$idActividad;
            $actividadExtraCH->horasSemanales=$horasSemanales;
            $actividadExtraCH->horasCuatrimestrales=$horasCuatrimestrales;
            $actividadExtraCH->save();
            return back()->with('success','Los datos de asignatura se han guardado correctamente');
            
            
        }
    }
    
    //método para eliminar las actividades de un profesor
    public function eliminarActividadExtra(Request $request){
        //se obtienen los datos pasados del form por request
        $idProfesor=$request->input('idProfesor');
        $idActividad=$request->input('idActividad');
        //busca la carga horaria por medio de su id y lo asigna a la variable cargaHoraria
        $cargaHoraria=Carga_horaria::where('id_profesor',$idProfesor)->first();
        $idCargaHoraria=$cargaHoraria->id;
        //obtiene la cantidad de horas de carga horaria y lo asigna a canHorasDisponibles
        $cantHorasDis=$cargaHoraria->horasDisponibles;
        //busca la asignatura con ese id y lo asigna a el objeto $asignatura
        $actividadExtraCH=Actividad_extra_ch::where('id_actividad_extra',$idActividad)->where('id_carga_horaria',$idCargaHoraria)->first();
        //obtiene la cantidad de horas y las asigna a la variable $cantHorasSem
        $cantHorasSem=$actividadExtraCH->horasSemanales;
        //hace la operación para regresarle sus horas a carga horaria
        $cantHorasResult=$cantHorasDis + $cantHorasSem;
        $cargaHoraria->horasDisponibles=$cantHorasResult;
        $cargaHoraria->save();
        //busca la asignacion horas de profesor para eliminar el registro
    
        $actividadExtraCH->delete();
        
        return back()->with('success','Los datos se han eliminado correctamente');
    }
    
    //método para eliminar la carga horaria de un profesor
    public function eliminarCargaHoraria(Request $request){
        try{
            
        $idProfesor=$request->input('idProfesor');
        //busca la carga horaria por medio del id del profesor
        $cargaHoraria=Carga_horaria::where('id_profesor',$idProfesor)->first();
        
        $cargaHoraria->delete();
        
        return back()->with('success','Los datos han sido borrados correctamente.');
        }catch(QueryException $ex){
             return back()->with('status','Los datos no han sido borrados correctamente,por favor intente de nuevo.');
        }
    }
}