<!--obtiene la plantilla base que se encuetra en views/main-->
@extends('main')
@section('botonNavUsuarios')
{{ 'active' }}
@endsection
<!--Inicia el contenido de usuarios-->
@section('contenido')
  <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
        <div class="row">
            <div class="col-md-8">
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
            </div>
            <div class="col-md-4 ">
                <div class="section_botones">
                    <button type="button" class="btn btn-info mt-1" data-toggle="modal" data-target="#ModalNuevoProfesor">Nuevo</button>
                 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-muted">
                    Para ver y modificar la contraseña es necesario ir al perfil del usuario
                </h6>
            </div>
        </div>
    </div>
    <!--/SECCIÓN DE GESTION

    SECCIÓN DE TABLA-->
    <div class="container" id="tablaUsuario">
        <table class="table table-bordered" id="tableUsuarios" >
            <thead class="thead-tabla">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre usuario</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Eliminar</th>
                   <th scope="col">Ver perfil</th>
                </tr>

            </thead>
            <tbody>
             
               @foreach($usuarios as $usu)
                <tr >
                <td>{{$usu->id }}</td>
                <td>{{$usu->username}}</td>
                <td>{{$usu->rol}}</td>
                <td>{{$usu->estado}}</td>  
                
             <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarUsuario" data-id="{{$usu->id}}" data-username="{{$usu->username}}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
             <td><a style="margin: 15px;" class=" btn btn-info btn-sm textVerperfil" href="/usuarios/{{$usu->id}}" ><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>

             <!-- <td><button type="button" class="btn btn-info"><a href="usuarios/{{$usu->id}}">Ver perfil</a></button></td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--/SECCIÓN DE TABLA-->
    <!--VENTANA MODAL PARA NUEVO USUARIO-->
    <div class="modal fade" id="ModalNuevoProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">NUEVO USUARIO</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('nuevoUsuario')}}" method="POST" >
                        {{ csrf_field() }}
                              <p class="text-muted">(*) El campo es obligatorio.</p>
                               <div class="row align-self-end">
                                   <div class="col-md-4 "><label for="usuario">(*)Nombre usuario:</label></div>
                                   <div class="col-md-6"><input type="text" id="usuario" class="form-control txtNusuario" name="usuario" placeholder="Escriba el usuario" required></div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="password">(*)Contraseña:</label>
                                   </div>
                                   <div class="col-md-6">
                                        <input class="form-control mt-1" type="text" id="password" class="form-control txtNcontraseña" name="password" placeholder="Escriba la contraseña" min="8" required>
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                        <label for="rol">(*)Rol:</label>
                                   </div>
                                   <div class="col-md-6">
                                       <select class="custom-select my-1 mr-sm-2" id="rol" name="rol" required>
                                <option value="">Seleccione</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Visitante">Visitante</option>
                              </select>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-4">
                                        <label for="estado">(*)Estado:</label>
                                   </div>
                                   <div class="col-md-6">
                                       <select class="custom-select my-1 mr-sm-2" id="estado" name="estado" required>
                                     <option value="">Seleccione</option>
                                     <option value="Activo">Activo</option>
                                     <option value="Inactivo">Inactivo</option>
                                   </select>
                                   </div>
                               </div>
                    <div class="modal-footer">
                    <button type="submit" id="agregarUsuarios" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!--/VENTANA MODAL PARA NUEVO USUARIO-->

    <!--VENTANA MODAL PARA ELIMINAR USUARIO-->
    <div class="modal fade" id="ModalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">ELIMINAR USUARIO.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('borrarUsuario')}}">
                        {{ csrf_field() }}
                    <input type="hidden" id="idUsuario" name="idUsuario" value="" class="form-control">
                    <strong>
                        Desea borrar la información del usuario con username:
                        <fieldset disabled>
                            <input  class="form-control" type="text" name="username" id="username" value="">
                        </fieldset>
                    </strong>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" >Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
    <!--/VENTANA MODAL PARA ELIMINAR USUARIO-->
@endsection