<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor_compartido;
use App\Programa_educativo;
use App\Carga_horaria;
use App\Actividad_extra;

class ProfesorCompartidoController extends Controller
{
    //
    //se crea el index para post
    public function index(){
     //obtiene una lista de los programas educativos 
        $programasEducativos=Programa_educativo::orderBy('nombreProgramaEducativo','asc')->pluck('nombreProgramaEducativo','id');
        //regresa una indice de todos los profesores junto con una paginación 
        $profesores = Profesor_compartido::paginate(15);
        //retorna la vista y pasa la variable profesores a esa vista
        return view('modulos.profesoresCompartidos.main',[
          'profesores'=>$profesores,
          'programasEducativos'=>$programasEducativos,
      ]);
    }
    //Método para agregar a un profesor a la base de datos
    public function nuevoProfesorC(Request $request){
        //try que realiza todo el código de guardado
        try{
        //crea una instancia del modelo para poder acceder a la base de datos 
        $profesor= new Profesor_compartido;
        //recibe los request ubicados en el formulario 
        $profesor->clave=$request->input('clave');
        $profesor->nombre=$request->input('nombre');
        $profesor->apellidoPaterno=$request->input('apellidoPaterno');
        $profesor->apellidoMaterno=$request->input('apellidoMaterno');
        $profesor->tipoProfesor='PA';
        $profesor->id_programa_educativo=$request->get('programaEducativo');    
        $profesor->save();
        
        return back()->with('success','Los datos han sido guardados correctamente');
        }catch(QueryException $ex){
            return redirect('/profesores')->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
        }      
    }
    
     //método para eliminar a un profesor
    public function eliminarProfesorC(Request $request){
        $id_profesor =$request->input('id');
        //Busca la carga horaria del profesor por medio de su id
        $cargaHoraria=Carga_horaria::where('id_profesor',$id_profesor);
        //encuentra al profesor por medio de su id
        $profesor = Profesor_compartido::findOrFail($id_profesor);
        //regresa true si el objeto $cargaHoraria es null
        if(is_null($cargaHoraria)){
        $profesor->delete();
             //regre a la vista con un mensaje de exito
      return back()->with('success','Los datos han sido eliminados correctamente');
        }else{
            $profesor->delete();
            $cargaHoraria->delete();
             //regre a la vista con un mensaje de exito
      return back()->with('success','Los datos han sido eliminados correctamente');
        }
    }
    
    //Método para editar a un profesor
    public function editarProfesorC(Request $request){
          try{
        $id =$request->input('id');
        $profesor = Profesor_compartido::find($id);      
        $profesor->clave = $request->input('clave');
        $profesor->nombre  = $request->input('nombre');
        $profesor->apellidoPaterno = $request->input('apellidoPaterno');
        $profesor->apellidoMaterno  = $request->input('apellidoMaterno');
        $profesor->tipoProfesor  = 'PA';
        $profesor->id_programa_educativo=$request->get('programaEducativo');  
        $profesor->save();
          return back()->with('success','Los datos han sido actualizados correctamente');
          }catch(QueryException $ex){
              return redirect('/profesores')->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
          }
    }
    
    //método para mostrar a un profesor
    public function showPerfil(Profesor_compartido $profesor){
       //obtiene una lista que es pasada al select de programas educativos
        $programasEducativos=Programa_educativo::orderBy('nombreProgramaEducativo','asc')->pluck('nombreProgramaEducativo','id');
        //obtiene una lista pasada al select de actividades
       $actividades = Actividad_extra::orderBy('nombre','asc')->pluck('nombre','id');
        //obtiene el id traido de la tabla
        $idProfesor = $profesor->id;
        //busca si existe una carga horaria con el id del profesor y la asigna a la variable $cargaHoraria
        $cargaHoraria= Carga_horaria::where('id_profesor',$idProfesor)->first();
       
        
        
        //regresa true si el objeto $cargaHoraria es null
        if(is_null($cargaHoraria)){
            //en caso de que retorne true solo mandara la variable profesor
            return view('modulos.profesores.perfil',[
            'profesor' => $profesor,
            'programasEducativos'=> $programasEducativos,
            'actividades' => $actividades,
        ]);
        //de lo contrario pasara los objetos cargaHoraria y especialidad     
        }else{
             $id_carga_horaria=$cargaHoraria->id;
            //obtiene todas las asignaturas relacionadas al profesor
            $asignacionAsignaturas=$this->getAsignaturasProfesor($id_carga_horaria);
            //obtiene todas las actividades relacionadas al profesor
            $actividadesProfesor=$this->getActividadesProfesor($id_carga_horaria);
            //retorna la vista y pasa todas las variables
            return view('modulos.profesores.perfil',[
            'profesor' => $profesor,
            'programasEducativos'=> $programasEducativos,
            'cargaHoraria' => $cargaHoraria,
            'asignacionAsignaturas'=>$asignacionAsignaturas,
            'actividades' => $actividades,
            'actividadesProfesor' => $actividadesProfesor,
        ]);
        
        }
    }
}
