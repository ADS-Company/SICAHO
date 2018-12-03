<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use Illuminate\Support\Facades\DB;
use App\Programa_educativo;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;


class crudCarrearas extends Controller
{
    //Metodo para mostrar los datos de las especialidades en la tabla
    public function index(){
    	$pEducativo = Programa_educativo::all();    
    	//$selectedPro = Programa_educativo::first()->id;    

    	$espe = Especialidad::get();
    	//dd($espe);
    	$carrera = DB::table('especialidad')->orderBy('id', 'Desc')->paginate(10);

    	$carreras = DB::table('especialidad')->join('Programa_educativo','Programa_educativo.id', '=', 'especialidad.id_programa_educativo')->select('especialidad.id','especialidad.created_at','especialidad.nombreEspecialidad','especialidad.acronimo','especialidad.id_programa_educativo','nombreProgramaEducativo')->orderBy('id', 'Desc')->paginate(10);
    	//dd($carreras);
	    return view('modulos.carreras.main',compact('carrera','carreras','pEducativo','selectedPro','espe'));
    }

    //Metodo para guardar registros desde la modal
    public function store(Request $request){ 
        try{
    	$rules = [
        	'Nombre' => 'required|max:50',
            'Acronimo' => 'required|max:10',
            'ProgramaEducativo' => 'required|max:50',
    	];
    	$this->validate($request, $rules);
 
    	// aquí va el procesamiento de los datos
 		//se crea una nueva asignatura
		$espe =  new Especialidad;
		$espe->nombreEspecialidad = $request->input('Nombre');
		$espe->acronimo = $request->input('Acronimo');
		$espe->id_programa_educativo = $request->get('ProgramaEducativo');

		//Se guardan los datos
		$espe->save();

		//Se recarga a la misma pagina ya con el dato ingresado
		return back()->with('message','Los datos han sido guardados correctamente.');
        }catch(QueryException $ex){
          return back()->with('errors','Los datos no han sido guardados correctamente, por favor intente de nuevo.');  
        }
    }

    //Metodo para editar registros desde la modal
    public function edit(Request $request, $id){
        try{
        $rules = [
            'especialidad' => 'required|max:50',
            'acronimo' => 'required|max:10',
            'ProgramaEducativo' => 'required|max:50',
        ];
        $this->validate($request, $rules);
        
    	$id = $request->input('clave');
		$nombreEspecialidad = $request->input('especialidad');
		$acronimo = $request->input('acronimo');
		$id_programa_educativo = $request->get('ProgramaEducativo');

		$especialidad = Especialidad::find($id);
		$especialidad->nombreEspecialidad = $nombreEspecialidad;
		$especialidad->acronimo = $acronimo;
		$especialidad->id_programa_educativo = $id_programa_educativo;
		$especialidad->save();

		return back()->with('message','Los datos han sido guardados correctamente');
        }catch(QueryException $ex){
          return back()->with('errors','Los datos no han sido guardados correctamente, por favor intente de nuevo.');  
        }
    }

    //Metodo para eliminar registros desde la modal
    public function destroyCarrera($id){
        try{
		$espe=\App\Especialidad::find($id);
		$espe->delete();
		return redirect()->back()->with('message', 'Los datos han sido borrados correctamente.');
        }catch(QueryException $ex){
          return back()->with('errors','Los datos no han sido guardados correctamente, por favor intente de nuevo.');  
        }
    }



    public function indexD(){
        $carrera=Auth::user()->estado;
        $programasEducativos=Programa_educativo::where('nombreProgramaEducativo',$carrera)->first();
        $idCarrera=$programasEducativos->id;    

        $espe = Especialidad::where('id_programa_educativo',$idCarrera)->get();
        //dd($espe);
        return view('perfilDirector.carreras.main',compact('carrera','espe'));
    }

        //Metodo para guardar registros desde la modal
    public function storeD(Request $request){ 
        $carrera=Auth::user()->estado;
        $programasEducativos=Programa_educativo::where('nombreProgramaEducativo',$carrera)->first();
        $idCarrera=$programasEducativos->id;

        try{
        $rules = [
            'Nombre' => 'required|max:50',
            'Acronimo' => 'required|max:10',
        ];
        $this->validate($request, $rules);
 
        // aquí va el procesamiento de los datos
        //se crea una nueva asignatura
        $espe =  new Especialidad;
        $espe->nombreEspecialidad = $request->input('Nombre');
        $espe->acronimo = $request->input('Acronimo');
        $espe->id_programa_educativo = $idCarrera;

        //Se guardan los datos
        $espe->save();

        //Se recarga a la misma pagina ya con el dato ingresado
        return back()->with('message','Los datos han sido guardados correctamente.');
        }catch(QueryException $ex){
          return back()->with('errors','Los datos no han sido guardados correctamente, por favor intente de nuevo.');  
        }
    }

    //Metodo para editar registros desde la modal
    public function editD(Request $request, $id){
        $carrera=Auth::user()->estado;
        $programasEducativos=Programa_educativo::where('nombreProgramaEducativo',$carrera)->first();
        $idCarrera=$programasEducativos->id;
        try{
        $rules = [
            'especialidad' => 'required|max:50',
            'acronimo' => 'required|max:10',
        ];
        $this->validate($request, $rules);
        
        $id = $request->input('clave');
        $nombreEspecialidad = $request->input('especialidad');
        $acronimo = $request->input('acronimo');
        $id_programa_educativo = $request->get('ProgramaEducativo');

        $especialidad = Especialidad::find($id);
        $especialidad->nombreEspecialidad = $nombreEspecialidad;
        $especialidad->acronimo = $acronimo;
        $especialidad->id_programa_educativo = $idCarrera;
        $especialidad->save();

        return back()->with('message','Los datos han sido guardados correctamente');
        }catch(QueryException $ex){
          return back()->with('errors','Los datos no han sido guardados correctamente, por favor intente de nuevo.');  
        }
    }

    //Metodo para eliminar registros desde la modal
    public function destroyCarreraD($id){
        try{
        $espe=\App\Especialidad::find($id);
        $espe->delete();
        return redirect()->back()->with('message', 'Los datos han sido borrados correctamente.');
        }catch(QueryException $ex){
          return back()->with('errors','Los datos no han sido guardados correctamente, por favor intente de nuevo.');  
        }
    }
}
