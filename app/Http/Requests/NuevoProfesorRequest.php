<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuevoProfesorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //Reglas para cada input del formulario nuevo profesor
            'clave' => 'required|max:150',
            'nombre' => 'required|max:150|alpha',
            'apellidoPaterno' => 'required|max:150|alpha',
            'apellidoMaterno' => 'required|max:150|alpha',
        ];
    }
    
    public function messages(){
        //se dan los mensajes personalizados para cada error de validación
        return [
            //mensaje de error cuando no se lleno el campo
            'clave.required' => 'Falta ingresar la clave del profesor',
            'nombre.required' => 'Falta ingresar el nombre del profesor',
            'apellidoPaterno.required' => 'Falta ingresar el apellido paterno del profeso',
            'apellidoMaterno.required' => 'Falta ingresar el apellido materno del profesor',
            //mensaje de error cuando se sobrepaso la longitud del campo 
            'clave.max' => 'El campo solo permite una longitud de 150 caracteres',
            'nombre.max' => 'El campo solo permite una longitud de 150 caracteres',nombre
            'apellidoPaterno.max' => 'El campo solo permite una longitud de 150 caracteres',
            'apellidoMaterno.max' => 'El campo solo permite una longitud de 150 caracteres',
            //Mensaje de error en los campos donde solo se permiten letras
            'nombre.alpha' => 'El campo solo permite letras',
            'apellidoPaterno.alpha' => 'El campo solo permite letras',
            'apellidoMaterno.alpha' => 'El campo solo permite letras',
        ];
    }
}
