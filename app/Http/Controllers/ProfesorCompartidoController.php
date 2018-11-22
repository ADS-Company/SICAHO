<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor_compartido;
use App\Programa_educativo;

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
}
