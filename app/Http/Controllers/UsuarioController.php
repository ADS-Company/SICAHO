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
//Uso de los modelos 
use App\User;

class UsuarioController extends Controller
{
 public function index()
 {
        //regresa una indice de todos los profesores junto con una paginación 
      $usuarios = User::paginate(15);
        //retorna la vista y pasa la variable profesores a esa vista
      return view('modulos.usuarios.main',compact('usuarios'));
}




  //Método para agregar a un profesor a la base de datos 
    public function nuevoUsuario(Request $request)
    {
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
        $usuario->username=$request->input('usuario');

         $usuario->password=$encriptado;
        // $usuario->passencrpt=password_hash($password, PASSWORD_DEFAULt);
        $usuario->rol=$request->get('rol');
        $usuario->estado=$request->get('estado');
        $usuario->save();
        return back()->with('success','Los datos han sido guardados correctamente');
           }
        }catch(QueryException $ex)
        {
            return back()->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
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
        $usuario->username = $request->input('usuario');
        $usuario->password  = $encriptado;
        $usuario->rol = $request->get('rol');
        $usuario->estado  = $request->get('estado');
        $usuario->save();
        return back()->with('success','Los datos han sido actualizados correctamente');
          }catch(QueryException $ex){
               return back()->with('status','Algunos datos no se han ingresado correctamente por favor intente de nuevo');
           }
    }



 public function showPerfil(User $usuario){
       $password = $usuario->password;
       $desencriptado= decrypt($password);
       //dd($desencriptado);

       return view('modulos.usuarios.perfil',[
        'usuario'=>$usuario,
        'desencriptado'=>$desencriptado,
       ]);
       }
        
    


}// Fin de la clase