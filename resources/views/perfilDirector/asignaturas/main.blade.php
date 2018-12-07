<!--obtiene la plantilla base que se encuetra en views/main-->
{{-- calling layouts \ app.blade.php --}}
@extends('mainDirector')
@section('botonNavAsignaturas')
{{ 'active' }}
@endsection
<!--Inicia el contenido de las asignaturas-->
@section('contenidoD')
 <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
       <div style="text-align: center;">
           <h4>{{ Auth::user()->estado }} </h4>
       </div>
        <div class="row">
            <div class="col-md-8">
            @include('perfilDirector.asignaturas.error')
            </div>
            <div class="col-md-4 ">
                <div class="section_botones">
                    <a href="" data-target="#ModalNuevaAsignatura" data-toggle="modal"><button class="btn btn-info">Nuevo</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--/SECCIÓN DE GESTION-->
    <!--SECCIÓN DE TABLA-->
      <div class="container" id="seccionTabla">
        <table class="table table-bordered" id="tableAsignaturas">
            <thead class="thead-tabla">
                <tr>
                   <th scope="col">Id</th>
                   <th scope="col">Cuatrimestre</th>
                    <th scope="col">Nombre de la asignatura</th>
                    <th scope="col">Horas semanales</th>
                    <th scope="col">Horas Cuatrimestrales</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>

            </thead>
           
            <tbody>
                @foreach($asignatura as $value)
                <tr class="post{{$value->id}}">
                    <td>{{$value->id}}</td>
                    <td>{{$value->cuatrimestre->nombreCuatrimestre}}</td>
                    <td>{{ $value->nombreAsignatura }}</td>
                    <td>{{ $value->horasSemanales }}</td>
                    <td>{{ $value->horasCuatrimestrales }}</td>
                    <td>{{ $value->programaEducativo->nombreProgramaEducativo }}</td>
                    <td>{{ $value->especialidad->nombreEspecialidad }}</td>
                    <td>
                        <!--<a href="route{{'mostrarModal', $value->id}}"  class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->nombreAsignatura}}" data-body="{{$value->horasSemanales}}">
                          <i class="fa fa-eye"></i>
                        </a>-->
                        <a data-target="#Modal-editar-{{$value->id}}" data-toggle="modal"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                    </td>
                    <td>
                        <a data-target="#Modal-Eliminar-{{$value->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                    </td>
                </tr>
                @include('perfilDirector.asignaturas.modalEliminar')
                @include('perfilDirector.asignaturas.modalC')
                @endforeach
            </tbody>
        </table>
    </div>
               <!--/SECCIÓN DE TABLA-->
            
    <!--VENTANA MODAL PARA NUEVA ASIGNATURA-->
    <div class="modal fade" action="rouete => registra" id="ModalNuevaAsignatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="POST">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">NUEVA ASIGNATURA.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                 
                   <!--Form para agregar-->
                    <form action="{{ route('GuardarAsignaturaD') }}" method="post">
                       {{ csrf_field() }}
                         <p class="text-muted">(*) El campo es obligatorio.</p>
                         <div class="row align-self-end">
                             <div class="col-md-4">
                                 <label for="programaEducativo">(*)Programa educativo:</label>
                             </div>
                             <div class="col-md-6">
                                  {!! Form::select('programaEducativo',$programasEducativos,null,['id'=>'programaEducativo','class'=>'form-control mt-1','placeholder'=>'Selecciona']) !!}
                             </div>
                         </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                        <label for="especialidad">(*)Especialidad:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('especialidad',['placeholder'=>'Selecciona'],null,['id'=>'especialidad','class'=>'form-control mt-1']) !!}
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                        <label for="cuatrimestre">(*)Cuatrimestre:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('cuatrimestre',['placeholder'=>'Selecciona'],null,['id'=>'cuatrimestre','class'=>'form-control mt-1']) !!}
                                   </div>
                               </div>
                                 <div class="row align-self-end">
                                     <div class="col-md-4">
                                         <label for="NombreAsignatura">(*)Nombre asignatura:</label>
                                     </div>
                                     <div class="col-md-6">
                                          <input type="text" class="form-control mt-1" name="NombreAsignatura" id="txtNombreAsignatura" placeholder="Escriba el nombre" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}" title="solo letras. Y máximo 50 caracteres" required="true">
                                     </div>
                                 </div>
                                     <div class="row align-self-end">
                                         <div class="col-md-4">
                                               <label for="HorasSemanales">(*)Horas por semana:</label>
                                         </div>
                                         <div class="col-md-6">
                                             <input class="form-control mt-1" type="text" name="HorasSemanales" id="txtHorasSemanales" placeholder="Escriba las horas" pattern="^[0-9]{1,2}" title="solo numeros. Y máximo 2 dígitos" required="true">
                                         </div>
                                     </div>
                                     <div class="row align-self-end">
                                         <div class="col-md-4">
                                              <label for="HorasCuatrimestre">(*)Horas por cuatrimestre:</label>
                                         </div>
                                         <div class="col-md-6">
                                             <input class="form-control mt-1" type="text" name="HorasCuatrimestre" id="HorasCuatrimestre" placeholder="Escriba las horas" pattern="^[0-9]{1,4}" title="solo numeros. Y máximo 4 dígitos" required="true">
                                         </div>
                                     </div>
                        <div class="modal-footer">
                           <input type="submit" class="btn btn-primary" value="Guardar">
                            <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    <!--/VENTANA MODAL PARA NUEVA ASIGNATURA-->
@endsection

