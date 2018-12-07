<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Response;
use App\Http\Requests;
use Illuminate\Database\QueryException; 
use App\Programa_educativo;
//Uso de los modelos 
use App\User;

class UsuarioController extends Controller
{
 public function index()
 {

      $proEd=Programa_educativo::all();
        //regresa una indice de todos los profesores junto con una paginación 
      $usuarios = User::paginate(15);
        //retorna la vista y pasa la variable profesores a esa vista
      return view('modulos.usuarios.main',compact('usuarios','proEd'));
}




  //Método para agregar a un profesor a la base de datos 
    public function nuevoUsuario(Request $request)
    {
      //Obtener el id del programa educativo que selecione
      $Idcarrera=$request->get('estado');
      $consulta=Programa_educativo::where('id',$Idcarrera)->first();
        if(is_null($consulta)){
            $estado='Activo';
            //try que realiza todo el código de guardado
               try{
                //crea una instancia del modelo para poder acceder a la base de datos 
                $password = $request->input('password');
                $length= strlen($password);
                   if($length<8){
                   return back()->with('status','El tamaño minimo de su contraseña debe de ser de 8 caracteres');
                   }else{
                $encriptado = encrypt($password);

                //recibe los request ubicados en el formulario 
                $usuario= new User;
                $usuario->nombre=$request->input('nombre');
                $apellidoP=$request->input('apellidoP');
                $apellidoM=$request->input('apellidoM'); 
                $usuario->apellidos=$apellidoP." ".$apellidoM;
                $usuario->email=$request->input('email');
                $usuario->username=$request->input('usuario');

                 $usuario->password=$encriptado;
                // $usuario->passencrpt=password_hash($password, PASSWORD_DEFAULt);
                $usuario->rol=$request->get('rol');
                $rol = $request->get('rol');
                    if ($rol=="Director") {
                      $idProEdu = $request->get('estado');
                      $proEdu=Programa_educativo::all()->where('id',$idProEdu)->first();
                      $carrera=$proEdu->nombreProgramaEducativo;
                      $usuario->estado  = $proEdu->nombreProgramaEducativo;
                    }else{
                      $usuario->estado  = $estado;
                    }
                //dd($usuario);
                $usuario->save();
                return back()->with('success','Los datos han sido guardados correctamente');
                   }
                }catch(QueryException $ex)
                {
                    return back()->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
                } 
        }else{
      $nombbreCarrera=$consulta->nombreProgramaEducativo;
      $nuevo=User::where('estado',$nombbreCarrera)->first();
            //dd($nuevo);
      //dd($nombbreCarrera);
            if (is_null($nuevo)) {
        //try que realiza todo el código de guardado
       try{
        //crea una instancia del modelo para poder acceder a la base de datos 
        $password = $request->input('password');
        $length= strlen($password);
           if($length<8){
           return back()->with('status','El tamaño minimo de su contraseña debe de ser de 8 caracteres');
           }else{
        $encriptado = encrypt($password);

        //recibe los request ubicados en el formulario 
        $usuario= new User;
        $usuario->nombre=$request->input('nombre');
        $apellidoP=$request->input('apellidoP');
        $apellidoM=$request->input('apellidoM'); 
        $usuario->apellidos=$apellidoP." ".$apellidoM;
        $usuario->email=$request->input('email');
        $usuario->username=$request->input('usuario');

         $usuario->password=$encriptado;
        // $usuario->passencrpt=password_hash($password, PASSWORD_DEFAULt);
        $usuario->rol=$request->get('rol');
        $rol = $request->get('rol');
            if ($rol=="Director") {
              $idProEdu = $request->get('estado');
              $proEdu=Programa_educativo::all()->where('id',$idProEdu)->first();
              $carrera=$proEdu->nombreProgramaEducativo;
              $usuario->estado  = $proEdu->nombreProgramaEducativo;
            }else{
              $usuario->estado  = $estado;
            }
        //dd($usuario);
        $usuario->save();
        return back()->with('success','Los datos han sido guardados correctamente');
           }
        }catch(QueryException $ex)
        {
            return back()->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
        } 
      }else{
        return back()->with('status','Ya existe un director para ese programa educativo');
      }
        }
      
    }

    //método para eliminar a un usuario
    public function borrarUsuario(Request $request){
        $id =$request->input('idUsuario');
        //Busca al usuario por medio del id 
        $usuario = User::findOrFail($id)->delete();
        //regre a la vista con un mensaje de exito
      return back()->with('success','Los datos han sido eliminados correctamente');
    }
    

     public function actualizarUsuario(Request $request){
          try{
            $id =$request->input('idUsuario'); 
            $password = $request->input('contraseña');
            $encriptado= encrypt($password);
            $usuario = User::find($id);    
            $usuario->nombre=$request->input('nombre');
            $apellidoP=$request->input('apellidoP');
            $apellidoM=$request->input('apellidoM');
            $usuario->apellidos=$apellidoP." ".$apellidoM;
            $usuario->email=$request->input('email');
            $usuario->username = $request->input('usuario');
            $usuario->password  = $encriptado;
            $usuario->rol = $request->get('rol');
            $rol = $request->get('rol');
            if ($rol=="Director") {
              $idProEdu = $request->get('estado');
              //dd($carrera);
              $proEdu=Programa_educativo::all()->where('id',$idProEdu)->first();
              $carrera=$proEdu->nombreProgramaEducativo;
              
              $usuario->estado  = $proEdu->nombreProgramaEducativo;
              
            }else{
              //dd($rol," Admi");
              $usuario->estado  = 'Activo';
            }
          
          
          $usuario->save();
        return back()->with('success','Los datos han sido actualizados correctamente');
          }catch(QueryException $ex){
               return back()->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
           }
    }



 public function showPerfil(User $usuario){
      $proEd=Programa_educativo::all();
       $nombre = $usuario->nombre;
       $password = $usuario->password;
       $desencriptado= decrypt($password);
       //dd($desencriptado);

       return view('modulos.usuarios.perfil',[
        'nombre'=>$nombre,
        'usuario'=>$usuario,
        'desencriptado'=>$desencriptado,
        'proEd'=>$proEd,
       ]);
  }

}// Fin de la clase