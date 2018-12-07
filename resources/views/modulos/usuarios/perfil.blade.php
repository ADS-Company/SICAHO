
@extends('main')
@section('botonNavUsuarios')
{{ 'active' }}
@endsection
@section('contenido')
<div id="seccionGestion">
                   @if(session('success'))
                         <div class="alert alert-success alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                             {{session('success')}}
                         </div>
                        @elseif(session('status'))
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                             {{session('status')}}
                         </div>
                         @endif
<div class="card">
    <div class="card-header">
        <h2 class="text-white">PERFIL DE USUARIO</h2>
    </div>
    <div class="card-body">
            <form method="post" action="{{route('actualizarUsuario')}}">
                         {{ csrf_field() }}
                            <p class="text-muted">(*) El campo es obligatorio.</p>
                             <input type="hidden" id="idUsuario" name="idUsuario" value="{{$usuario->id}}" class="form-control">
                             <div class="row align-self-end">
                                   <div class="col-md-4 "><label for="nombre">(*)Nombre:</label></div>
                                   <div class="col-md-6"><input type="text" id="nombre" class="form-control txtNusuario" name="nombre" placeholder="Escriba el nombre" required></div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4 "><label for="apellidos">(*)Apellidos:</label></div>
                                   <div class="col-md-3"><input type="text" id="apellidoP" class="form-control txtNusuario" name="apellidoP" placeholder="Apellido paterno" required></div><div class="col-md-3"><input type="text" id="apellidoM" class="form-control txtNusuario" name="apellidoM" placeholder="Apellido materno" required></div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4 "><label for="email">(*)Correo electronico:</label></div>
                                   <div class="col-md-6"><input type="text" id="email" class="form-control txtNusuario" name="email" placeholder="Escriba su email" required></div>
                               </div>
                                <div class="row ">
                                    <div class="col-md-6"> <label for="usuario">(*)Nombre de usuario:</label></div>
                                    <div class="col-md-6 align-self-end"> 
                                <input type="text" id="usuario" name="usuario" value="{{$usuario->username}}" placeholder="Escriba nombre de usuario" class="form-control my-1 mr-sm-2" required></div>
                                </div>
                            <div class="row justify-content-start">
                                <div class="col-md-6"><label for="contraseña">(*)Contraseña:</label></div>
                                <div class="col-md-6">
                                <input class="form-control my-1 mr-sm-2" type="text" id="contraseña" name="contraseña" placeholder="Escriba la contraseña" value="{{$desencriptado}}" required></div>
                            </div>
                            <div class="row justify-content-start">
                                <div class="col-md-6"><label for="rol">(*)Rol:</label></div>
                                <div class="col-md-6"><select class="custom-select my-1 mr-sm-2" id="rol" name="rol" value="" required>
                                <option value="">Seleccione</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Director">Director</option>
                              </select></div>
                            </div>
                            <div class="row">
                               <div class="col-md-6">
                                   <div><label for="estado">(*)Programa educativo:</label></div>
                               </div>
                               <div class="col-md-6 ">
                                <div><select class="custom-select my-1 mr-sm-2" id="estado" name="estado" value="" >
                                <option value="">Seleccione</option>
                                @foreach($proEd as $pe)
                                    <option value="{{ $pe->id }}">{{ $pe->nombreProgramaEducativo }}</option>
                                @endforeach
                                </select></div>
                               </div>
                            </div>
                    <div class="col-md-2 offset-md-10 pull-right"><button type="submit" class="btn btn-warning">Actualizar</button></div>
                       </form>
    </div>
</div>

    
</div>



@endsection
