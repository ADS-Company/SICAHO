@extends('main')
<!--Se modifica el marcador para la barra de navegación
para marcar a la opción de profesores-->
@section('botonNavProfesoresCompartidos')
{{ 'active' }}
@endsection
<!--Empieza el contenido para profesores-->
<div id="container-perfilProfesor">
@section('contenido')
   <!--Sección para agregar horas al profesor-->
    <div id="seccionAgregarHoras">
       <div class="row">
          <div class="col-md-12"><h2>PERFIL DE PROFESOR</h2></div>
          <div class="col-md-12"> <h2 class="tituloCedido">PERTENECE A: {{$profesor->programaEducativo->nombreProgramaEducativo}}</h2></div>
       </div>
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
                    @if(Auth::user()->rol == 'Administrador')
                    @if(isset($cargaHoraria))
                     <div class="section_botones">
                     <td><button  type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#ModalCompartirProfesor" data-id="{{$profesor->id}}" data-clave="{{$profesor->clave}}" data-nombre="{{$profesor->nombre}}" data-apellidoPaterno="{{$profesor->apellidoPaterno}}"
                 data-apellidoMaterno="{{$profesor->apellidoMaterno}}"> <i class="fa fa-share-square-o" aria-hidden="true"></i>Compartir</button></td>
                     </div>
                    @else
                    <div class="section_botones">
                    <button id="btnNuevoProfesorModal" type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#ModalHorasProfesor" data-id="{{$profesor->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar horas</button>
                </div>
                @endif
                @endif
            </div>
            <table class="table table-bordered" id="tablePerProfesor">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Tipo de profesor</th>
                    <th scope="col">Horas totales</th>
                    <th scope="col">Horas Disponibles</th>
                    @if(Auth::user()->rol == 'Administrador')
                    @if(isset($cargaHoraria))
                    <th scope="col">Eliminar carga horaria</th>
                    @else
                    @endif
                    @endif
                </tr>

            </thead>
            <tbody>
                <tr>
                   <td>{{$profesor->id}}</td>
                   <td>{{$profesor->clave}}</td>
                   <td>{{$profesor->programaEducativo->nombreProgramaEducativo}}</td>
                   <td>{{$profesor->nombre}}</td>
                   <td>{{$profesor->apellidoPaterno}}</td>
                   <td>{{$profesor->apellidoMaterno}}</td>   
                   <td>{{$profesor->tipoProfesor}}</td>
                   @if(isset($cargaHoraria))
                   <td>{{$cargaHoraria->horasTotales}}</td>
                   @else
                   <td>0</td>                
                   @endif
                   @if(isset($cargaHoraria))
                   <td>{{$cargaHoraria->horasDisponibles}}</td>
                   @else
                   <td>0</td>
                   @endif
                    @if(isset($cargaHoraria) )
                    <td><button type="button" class="btn btn-danger btnActualizarProfesor" data-toggle="modal" data-target="#ModalEliminarCargaHoraria" data-id=""><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                    @else
                    @endif
                </tr>
            </tbody>
    </table> 
    </div>
   <!--/Sección para agregar horas al profesor-->      
    
    <!--Sección para asignar asignaturas a profesor-->
    <div id="seccionMateriasProfesor">
        <h2>ASIGNATURAS</h2>
        <div class="row">
            <div class="col-md-8">
                    </div>
                    @if(isset($cargaHoraria))
                     <div class="section_botones">
                    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#ModalAgregarAsignaturaProfesor" data-id="{{$profesor->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Asignatura</button>
                </div>
            </div> 
            @if(isset($asignacionAsignaturas))
       <table class="table table-bordered" id="tablePerasigProfesor">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Cuatrimestre</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Horas por semana</th>
                    <th scope="col">Horas por cuatrimestre</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
               @foreach($asignacionAsignaturas as $asignatura)
            @if($asignatura->id_carga_horaria_compartido == $cargaHoraria->id and $asignatura->id_compartido == null)
               <tr>
                <td>{{$asignatura->asignatura->id}}</td>
                <td>{{$asignatura->programaEducativo->nombreProgramaEducativo}}</td>
                <td>{{$asignatura->especialidad->nombreEspecialidad}}</td>
                <td>{{$asignatura->cuatrimestre->nombreCuatrimestre}}</td>
                <td>{{$asignatura->asignatura->nombreAsignatura}}</td>
                <td>{{$asignatura->asignatura->horasSemanales}}</td>
                <td>{{$asignatura->asignatura->horasCuatrimestrales}}</td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarAsignaturaProfesor" data-id="{{$asignatura->asignatura->id}}" data-nombre="{{$asignatura->asignatura->nombreAsignatura}}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr>
                @endif
          @endforeach
            </tbody>
    </table>
    @else
    
    @endif
     @else
    <h4 class="text-muted justify-content-start">Debe agregar primero las horas al profesor, para poder asignar sus asignaturas.</h4>
    @endif
    </div>
    <!--/Sección para asignar asignaturas a profesor-->
    
    <!--Sección para asignar actividades extra-->
    <div id="seccionActividadesProfesor">
        <h2>ACTIVIDADES EXTRA</h2>
        @if(isset($cargaHoraria))
        <div class="row">
            <div class="col-md-8">
                    </div>
                    <div class="section_botones">
                    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#ModalAgregarActividadProfesor" data-id="{{$profesor->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Actividad</button>
                </div>
            </div> 
             @if(isset($actividadesProfesor))
    <table class="table table-bordered" id="tablePerActProfesor">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Cuatrimestre</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Horas por semana</th>
                    <th scope="col">Horas por cuatrimestre</th>
                    <th scope="col">Eliminar</th>
                </tr>

            </thead>
            <tbody>
               @foreach($actividadesProfesor as $actividad)
               @if($actividad->id_carga_horaria_compartido == $cargaHoraria->id and $actividad->id_compartido == null)
                <tr>
                   <td>{{$actividad->actividadExtra->id}}</td>
                   <td>{{$actividad->programaEducativo->nombreProgramaEducativo}}</td>
                   <td>{{$actividad->cuatrimestre->nombreCuatrimestre}}</td>
                   <td>{{$actividad->actividadExtra->nombre}}</td>
                   <td>{{$actividad->horasSemanales}}</td>   
                   <td>{{$actividad->horasCuatrimestrales}}</td>
                   <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarActividadProfesor" data-id="{{$actividad->actividadExtra->id}}" data-nombre="{{$actividad->actividadExtra->nombre}}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr>
                @endif
                @endforeach
            </tbody>
    </table>
    @else
    @endif
    @else
    <h4 class="text-muted justify-content-start">Debe agregar primero las horas al profesor, para poder asignar sus actividades.</h4>
    @endif
    </div>
    <!--Sección para asignar actividades extra-->
    
    <!--Sección de mostrar compartido con quien esta-->
    @if(isset($compartido))
    @foreach($compartido as $compartido)
     <div id="seccionCompartido">
     <!--SECCIÓN INFORMACION COMPARTIDO-->
     <div class="row">
          <div class="col-md-12"><h2 class="tituloCedido">CEDIDO A: {{$compartido->programaEducativo->nombreProgramaEducativo}}</h2></div>
       </div>
     </div>
     <div class="row">
         <table class="table table-bordered" id="tablePerProfesor">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Tipo de profesor</th>
                    <th scope="col">Horas totales</th>
                    <th scope="col">Horas Disponibles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <td>{{$compartido->profesor->id}}</td>
                   <td>{{$compartido->profesor->clave}}</td>
                   <td>{{$compartido->programaEducativo->nombreProgramaEducativo}}</td>
                   <td>{{$compartido->profesor->nombre}}</td>
                   <td>{{$compartido->profesor->apellidoPaterno}}</td>
                   <td>{{$compartido->profesor->apellidoMaterno}}</td>   
                   <td>{{$compartido->profesor->tipoProfesor}}</td>
                   @if(isset($cargaHoraria))
                   <td>{{$compartido->horas_cedidas}}</td>
                   @else
                   <td>0</td>                
                   @endif
                   @if(isset($cargaHoraria))
                   <td>{{$compartido->horas_disponibles}}</td>
                   @else
                   <td>0</td>
                   @endif
                </tr>
            </tbody>
    </table> 
     </div>
     <!--SECCIÓN INFORMACION COMPARTIDO-->
      <!--Sección para asignar asignaturas a profesor-->
    <div id="seccionMateriasProfesor">
        <h2>ASIGNATURAS</h2>
        <div class="row">
            <div class="col-md-8">
                    </div>
                    @if(isset($cargaHoraria))
                     <div class="section_botones">
                    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#ModalAgregarAsignaturaCompartido" data-id="{{$profesor->id}}" data-idcompartido="{{$compartido->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Asignatura</button>
                </div>
                <fieldset hidden>
                  
                </fieldset>
            </div> 
            @if(isset($asignacionAsignaturas))
       <table class="table table-bordered" id="tablePerasigProfesor">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Cuatrimestre</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Horas por semana</th>
                    <th scope="col">Horas por cuatrimestre</th>
                    <th scope="col">Eliminar</th>
                </tr>

           </thead>
            <tbody>
               @foreach($asignacionAsignaturas as $asignatura)
              @if($asignatura->id_compartido == $compartido->id)
               <tr>
                <td>{{$asignatura->asignatura->id}}</td>
                <td>{{$asignatura->programaEducativo->nombreProgramaEducativo}}</td>
                <td>{{$asignatura->especialidad->nombreEspecialidad}}</td>
                <td>{{$asignatura->cuatrimestre->nombreCuatrimestre}}</td>
                <td>{{$asignatura->asignatura->nombreAsignatura}}</td>
                <td>{{$asignatura->asignatura->horasSemanales}}</td>
                <td>{{$asignatura->asignatura->horasCuatrimestrales}}</td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarAsignaturaCompartido" data-id="{{$asignatura->asignatura->id}}" data-nombre="{{$asignatura->asignatura->nombreAsignatura}}" data-idcompartido="{{$compartido->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr>
                 @endif
            @endforeach
            </tbody>
    </table>
    @else
    
    @endif
     @else
    <h4 class="text-muted justify-content-start">Debe agregar primero las horas al profesor, para poder asignar sus asignaturas.</h4>
    @endif
    </div>
    <!--/Sección para asignar asignaturas a profesor-->
    
    <!--Sección para asignar actividades extra-->
    <div id="seccionActividadesProfesor">
        <h2>ACTIVIDADES EXTRA</h2>
        @if(isset($cargaHoraria))
        <div class="row">
            <div class="col-md-8">
                    </div>
                    <div class="section_botones">
                    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#ModalAgregarActividadCompartido" data-id="{{$profesor->id}}" data-idcompartido="{{$compartido->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Actividad</button>
                </div>
            </div> 
             @if(isset($actividadesProfesor))
    <table class="table table-bordered" id="tablePerActProfesor">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Cuatrimestre</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Horas por semana</th>
                    <th scope="col">Horas por cuatrimestre</th>
                    <th scope="col">Eliminar</th>
                </tr>

            </thead>
            <tbody>
               @foreach($actividadesProfesor as $actividad)
              @if($actividad->id_compartido == $compartido->id)
                <tr>
                   <td>{{$actividad->actividadExtra->id}}</td>
                   <td>{{$actividad->programaEducativo->nombreProgramaEducativo}}</td>
                   <td>{{$actividad->cuatrimestre->nombreCuatrimestre}}</td>
                   <td>{{$actividad->actividadExtra->nombre}}</td>
                   <td>{{$actividad->horasSemanales}}</td>   
                   <td>{{$actividad->horasCuatrimestrales}}</td>
                   <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarActividadCompartido" data-id="{{$actividad->actividadExtra->id}}" data-nombre="{{$actividad->actividadExtra->nombre}}" data-idcompartido="{{$compartido->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr>
                @endif
                @endforeach
            </tbody>
    </table>
    @else
    @endif
    @else
    <h4 class="text-muted justify-content-start">Debe agregar primero las horas al profesor, para poder asignar sus actividades.</h4>
    @endif
    </div>
    <!--Sección para asignar actividades extra-->
     @endforeach
     @else
     @endif
    <!--/Sección de mostrar compartido con quien esta-->
    
    <!--MODAL PARA AGREGAR HORAS DE PROFESOR-->
    @include('modulos.profesoresCompartidos.modal-horas')
    <!--/MODAL PARA AGREGAR HORAS DE PROFESOR-->
    <!--VENTANA MODAL PARA COMPARTIR PROFESOR-->
     @include('modulos.profesoresCompartidos.modal-compartir')
    <!--/VENTANA MODAL PARA COMPARTIR PROFESOR-->
      
    <!--VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
     @include('modulos.profesoresCompartidos.modal-asignaturas')
    <!--/VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
      
    <!--VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
     @include('modulos.profesoresCompartidos.modales-actividades')
    <!--/VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
     
     <!--VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
     @include('modulos.profesoresCompartidos.modales-asignaturasCompartido')
    <!--/VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
     
     <!--VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
     @include('modulos.profesoresCompartidos.modales-actividadesCompartido')
    <!--/VENTANAS MODAL PARA AGREGAR ASIGNATURAS A UN PROFESOR-->
      
      
@endsection
</div>
