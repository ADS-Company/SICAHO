<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    //recibe la reglas de validación desde una clase independiente
   public function login(LoginRequest $request){
       $credentials=$request->validated();
    //Verifica si las credenciales son correctas para poder logearlo
        if(Auth::attempt($credentials)){
            //redirecciona si es que se logeo 
         return redirect('/inicio');
        }else{
        return back()->withErrors([
            //retorna a la página de inicio para indicar el error
            'username' => 'El usuario no se encontro en la base de datos'
        ])->withInput(request(['username']));
        }
    }
    //método que cierra la sesión del usuario y redirige a la página de login
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    //cambiar el parametro que va a recibir ya que trae el email como default
    public function username()
     {
        return 'username';
     }
    
    
}
