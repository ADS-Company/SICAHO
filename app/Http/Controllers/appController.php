<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa_educativo;
class appController extends Controller
{
    //Muestra la vista del login
    public function welcome(){
    
    return view('login');
    } //muestra la vista de la página principal
    public function main(){
        return view('bienvenido');
    }//muestra la vista de la página carga horaria
     public function cargaHoraria(){
        return view('modulos.cargaHoraria.main');
    }
    //muestra la vista de la página asignaturas
     public function asignaturas(){
        return view('modulos.asignaturas.main');
    }
    //muestra la vista de la página profesores
     public function profesores(){
        return view('modulos.profesores.main');
    }
    //muestra la vista de la página carreras
     public function carreras(){
        return view('modulos.carreras.main');
    }
    //muestra la vista de la página catalogos
     public function catalogos(){
        return view('modulos.catalogos.main');
    }
    //muestra la vista de la página usuarios
     public function usuarios(){
        return view('modulos.usuarios.main');
    }

    //--------------------------------------------------//
    //--------------------------------------------------//
    //--------------------------------------------------//

    //muestra la vista de la página del Director
    public function mainD(){
        return view('bienvenidoDirector');
    }//muestra la vista de la página carga horaria
     public function cargaHorariaD(){
        return view('perfilDirector.cargaHoraria.main');
    }
    //muestra la vista de la página asignaturas
     public function asignaturasD(){
        return view('perfilDirector.asignaturas.main');
    }
    //muestra la vista de la página profesores
     public function profesoresD(){
        return view('perfilDirector.profesores.main');
    }
    //muestra la vista de la página carreras
     //public function especialidadesD(){
        //return view('perfilDirector.carreras.main');
    //}
    //muestra la vista de la página catalogos
     public function catalogosD(){
        return view('perfilDirector.profesoresCompartidos.main');
    }
    //muestra la vista de la página usuarios
     public function usuariosD(){
        return view('perfilDirector.usuarios.main');
    }
    
    //muestra la vista de la página de los profesores compartidos
    public function profesoresCompartidos(){
        return view('perfilDirector.profesoresCompartidos.main');
    }
}
