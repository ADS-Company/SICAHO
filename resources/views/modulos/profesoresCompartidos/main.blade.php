@extends('main')
<!--Se modifica el marcador para la barra de navegación
para marcar a la opción de profesores-->
@section('botonNavProfesoresCompartidos')
{{ 'active' }}
@endsection
<!--Empieza el contenido para profesores-->
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
                        <div class="alert alert-warning alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                             {{session('status')}}
                         </div>
                         @endif
                    </div>
            <div class="col-md-4 ">
                <div class="section_botones">
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#ModalNuevoProfesor">Nuevo</button>
                </div>
            </div>
        </div>
    </div>
    <!--/SECCIÓN DE GESTION-->
    
     <!--SECCIÓN DE TABLA-->
      <div class="container" >
        <table class="table table-bordered" id="tablaProfesores">
            <thead class="thead-tabla">
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Tipo de profesor</th>
                    <th scope="col">Pertenece a</th>
                    <th scope="col">Compartido con</th>
                    <th scope="col">Horas totales</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Compartir</th>
                    <th scope="col">Ver perfil</th>
                </tr>

            </thead>
            <tbody>
               @csrf 
               <?php  $no=1; ?>
               @foreach($profesores as $profesor)
               <tr class="profesor{{$profesor->id}}">
                <td>{{$profesor->clave}}</td>
                <td>{{$profesor->nombre}}</td>
                <td>{{$profesor->apellidoPaterno}}</td>
                <td>{{$profesor->apellidoMaterno}}</td>
                <td>{{$profesor->tipoProfesor}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="button" class="btn btn-warning btnActualizarProfesor" data-toggle="modal" data-target="#ModalActualizarProfesor" data-id="{{$profesor->id}}" data-clave="{{$profesor->clave}}" data-nombre="{{$profesor->nombre}}" data-apellidopaterno="{{$profesor->apellidoPaterno}}" data-apellidomaterno="{{$profesor->apellidoMaterno}}" data-tipoprofesor="{{$profesor->tipoProfesor}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarProfesor" data-id="{{$profesor->id}}" data-clave="{{$profesor->clave}}" data-nombre="{{$profesor->nombre}}" data-apellidoPaterno="{{$profesor->apellidoPaterno}}"
                 data-apellidoMaterno="{{$profesor->apellidoMaterno}}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                 <td><button class=" btn btn-warning btn-sm textVerperfil">
                     <i class="fa fa-share-square-o" aria-hidden="true"></i></button></td>
                <td><a class=" btn btn-info btn-sm textVerperfil" href="/profesores/{{$profesor->id}}" ><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
               </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    
    <!--/SECCIÓN DE TABLA-->
    
      <!--VENTANA MODAL PARA ACTUALIZAR PROFESOR-->
   @include('modulos.profesoresCompartidos.modal-editar')
    <!--/VENTANA MODAL PARA ACTUALIZAR PROFESOR-->
    
     <!--VENTANA MODAL PARA NUEVO PROFESOR-->
     @include('modulos.profesoresCompartidos.modal-nuevo')
    <!--/VENTANA MODAL PARA NUEVO PROFESOR-->
    
    <!--VENTANA MODAL PARA ELIMINAR PROFESOR-->
       @include('modulos.profesoresCompartidos.modal-eliminar')
      <!--/VENTANA MODAL PARA ELIMINAR PROFESOR-->
      
      <!--VENTANA MODAL PARA COMPARTIR PROFESOR-->
       @include('modulos.profesoresCompartidos.modal-compartir')
      <!--/VENTANA MODAL PARA COMPARTIR PROFESOR-->
@endsection