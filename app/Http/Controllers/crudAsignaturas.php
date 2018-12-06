<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\http\Requests\AsignaturaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 
//instancia de los modelos
use App\Carga_horaria;
use App\Profesor;
use App\Actividad_extra_ch;
use App\Asignacion_horas_profesor;
use App\Cuatrimestre_especialidad;
use App\Profesor_compartido;
use App\Programa_educativo;
use App\Asignatura_cuatrimestre;
use App\Especialidad;
use App\Cuatrimestre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;


class crudAsignaturas extends Controller{
	 //Metodo para mostrar los datos de la asignatura
	public function index(){
		$programasEducativos=Programa_educativo::orderBy('nombreProgramaEducativo','asc')->pluck('nombreProgramaEducativo','id');
        dd($programasEducativos);
		/*$consulta = DB::table('carga_horaria')
		->join('profesor','profesor.id','=','carga_horaria.id_profesor')
		->join('programa_educativo','programa_educativo.id','=','carga_horaria.id_programa_educativo')
		->get(); 'consulta',*/

	    $materias = Asignatura::paginate(10);
	    //dd($materias);
	    //return view('modulos.asignaturas.main',compact('materias','programasEducativos'));
        return view('modulos.asignaturas.main',[
        'materias'=>$materias,
        'ProgramasEducativos'=>$programasEducativos,
        ]);
	}

  	//Metodo para mostrar los datos en el select especialidad del modal nuevaAsignatura
  	public function especialidades(){
  		$carreras_id =  Input::get('id_programa_educativo');
  		$especialidades = Especialidad::where('id_programa_educativo','=', $carreras_id)->get();
  		//dd($especialidades);
  		return response()->json($especialidades);
  	}

  	//Metodo para mostrar los datos en el select cuatrimestre del modal nuevaAsignatura
  	public function cuatris(){
  		$espe_id =  Input::get('id_especialidad');
  		$especialidad =Especialidad::find($espe_id);
  		$cuatrimestres=$especialidad->cuatrimestres()->get();
  		return response()->json($cuatrimestres);
  	}

  	//Metodo para mostrar los datos en el select especialidad del modal editarAsignatura
  	public function especialidadesE(){
  		$carreras_id =  Input::get('id_programa_educativo');
  		$especialidades = Especialidad::where('id_programa_educativo','=', $carreras_id)->get();
  		//dd($especialidades);
  		return response()->json($especialidades);
  	}

  	//Metodo para mostrar los datos en el select cuatrimestre del modal editarAsignatura
  	public function cuatrisE(){
  		//$espe_id =  Input::get('id_especialidad');
  		//$cuatrimestres = Cuatrimestre_especialidad::where('id_especialidad','=', $espe_id)->get();
  		//dd($cuatrimestres);
  		$cuatrimestres = Cuatrimestre::all();
  		return response()->json($cuatrimestres);
  	}

	public function create(){
		return view('modulos.asignaturas.main');
	}

	//Metodo para guardar los datos de la ventana modal nueva asignatura
	public function store(Request $request){
        try{
		$rules = [ 
			'programaEducativo'=> 'required',
			'especialidad'=> 'required',
			'cuatrimestre'=> 'required',
        	'NombreAsignatura' => 'required|max:50',
            'HorasSemanales' => 'required|max:2',
            'HorasCuatrimestre' => 'required|max:4',
    	];
 
    	$this->validate($request, $rules);
    	// aquí va el procesamiento de los datos
 		//se crea una nueva asignatura
		$Asignatura =  new Asignatura;
		$Asignatura->id_programa_educativo = $request->get('programaEducativo');
		$Asignatura->id_especialidad = $request->get('especialidad');
		$Asignatura->id_cuatrimestre = $request->get('cuatrimestre');
		$Asignatura->nombreAsignatura = $request->input('NombreAsignatura');
		$Asignatura->horasSemanales = $request->input('HorasSemanales');
		$Asignatura->horasCuatrimestrales = $request->input('HorasCuatrimestre');
		//Se guardan los datos
		$Asignatura->save();
		//Se recarga a la misma pagina ya con el dato ingresado
		return back()->with('message','Los datos se han guardado correctamente.');
        }catch(QueryException $ex){
          return back()->with('error','Algunos datos no se han guardado correctamente, por favor intente de nuevo.');  
        }
	}


	public function editAsignatura($id){
		//dd("editando id: " . $id);
		$value = Asignatura::where('id',$id)->first();
		return view('modulos.asignaturas.modalC',['nombreAsignatura'=>$value]);
	}

	//Metodo para Editar los datos de la modal editarAsignatura
	public function editarAsignatura(Request $request, $id){
        try{
		$id = $request->input('clave');
		$rules = [ 
			'programa_educativo'=> 'required',
			'especialidadEs'=> 'required',
			'cuatrimestre'=> 'required',
        	'nombreAsignatura' => 'required|max:50',
            'HorasSemanales' => 'required|max:2',
            'HorasCuatrimestre' => 'required|max:4',
    	];
 
    	$this->validate($request, $rules);
		//dd("editando el id: " . $id);
		$programaEduc = $request->get('programa_educativo');
		$especialidad = $request->get('especialidadEs');
		$cuatri = $request->get('cuatrimestre');
		$nombreAsignatura = $request->input('nombreAsignatura');
		$horasSemanales = $request->input('HorasSemanales');
		$horasCuatrimestrales = $request->input('HorasCuatrimestre');
		//dd($programaEduc);

		$asignatura = Asignatura::find($id);
		$asignatura->id_programa_educativo = $programaEduc;
		$asignatura->id_especialidad = $especialidad;
		$asignatura->id_cuatrimestre = $cuatri;
		$asignatura->nombreAsignatura = $nombreAsignatura;
		$asignatura->horasSemanales = $horasSemanales;
		$asignatura->horasCuatrimestrales = $horasCuatrimestrales;
		$asignatura->save();

		return back()->with('message','Los datos se han guardado correctamente');
        }catch(QueryException $ex){
            return back()->with('error','Algunos datos no se han guardado correctamente, por favor intente de nuevo.'); 
        }
	}

	//Metodo para eliminar una asignatura desde la ventana modalEliminar
	public function destroyAsignatura($id){
        try{
		//dd("eliminando id: " . $id);
		$asignatura=\App\Asignatura::find($id);
		$asignatura->delete();
		return redirect()->back()->with('message', 'Los datos se han borrado correctamente');
        }catch(QueryException $ex){
            return back()->with('error','Algunos datos no se han guardado correctamente, por favor intente de nuevo.');
        }
	}


	
	
  	public function indexD(){
  		$carrera=Auth::user()->estado;
	    $programasEducativos=Programa_educativo::where('nombreProgramaEducativo',$carrera)->first();
	    $idCarrera=$programasEducativos->id;
	    $id=Programa_educativo::where('id',$idCarrera)->select('id')->first();
		$asignatura= Asignatura::where('id_programa_educativo',$idCarrera)->get();
	    //dd($id);
	    return view('perfilDirector.asignaturas.main',compact('asignatura','carrera','programasEducativos','idCarrera','id'));
  	}
}
