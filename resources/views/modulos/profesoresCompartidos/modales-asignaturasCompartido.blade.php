 <!--VENTANA MODAL PARA AGREGAR ASIGNATURAS A PROFESOR-->
   <div class="modal fade" id="ModalAgregarAsignaturaCompartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">AGREGAR ASIGNATURA A PROFESOR COMPARTIDO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('agregarAsignacionCompartir')}}">
                       {{ csrf_field() }}
                      <input class="form-control" type="hidden" id="idProfesorCompartido" name="idProfesorCompartido" placeholder="Escriba la clave" value="{{$compartido->id}}" >
                       <p class="text-muted">(*) El campo es obligatorio.</p>
                        <div class="row align-self-end">
                            <div class="col-md-4">
                                <label for="programaEducativo">(*)Programa educativo:</label>
                            </div>
                            <div class="col-md-6">
                                {!! Form::select('programaEducativo',$programasEducativos,null,['id'=>'programaEducativo','class'=>'form-control mt-1','placeholder'=>'Selecciona','required']) !!}
                            </div>
                        </div>
                              <div class="row align-self-end">
                                  <div class="col-md-4">
                                      <label for="programaEducativo">(*)Especialidad:</label>
                                  </div>
                                  <div class="col-md-6">
                                      {!! Form::select('especialidades',['placeholder'=>'Selecciona'],null,['id'=>'especialidades','class'=>'form-control mt-1','required']) !!}
                                  </div>
                              </div> 
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="cuatrimestre">(*)Cuatrimestre:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('cuatrimestres',['placeholder'=>'Selecciona'],null,['id'=>'cuatrimestres','class'=>'form-control mt-1','required']) !!}
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="asignatura">(*)Asignatura:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('asignaturas',['placeholder'=>'Selecciona'],null,['id'=>'asignaturas','class'=>'form-control mt-1','required']) !!}
                                   </div>
                               </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </div>
                 </form>
                  </div>
                 
            </div>
        </div>
    </div>
    <!--/VENTANA MODAL PARA ASIGNATURAS DE PROFESOR-->
  <!--VENTANA MODAL PARA ELIMINAR ASIGNATURA PROFESOR COMPARTIDO-->
    <div class="modal fade" id="ModalEliminarAsignaturaCompartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">ELIMINAR ASIGNATURA A PROFESOR COMPARTIDO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('eliminarAsignacionCompartido')}}">
                       {{ csrf_field() }}
                       <!--id de profesor-->
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                      <input class="form-control" type="hidden" id="idProfesorCompartido" name="idProfesorCompartido" placeholder="Escriba la clave" value="{{$compartido->id}}">
                       <!--id de asignatura-->
                        <input class="form-control" type="hidden" id="idAsignatura" name="idAsignatura" placeholder="Escriba la clave" value="" >
                               <div class="row">
                            <div class="col-sm-2">
                                <label for="asignatura">Asignatura: </label>
                            </div>
                              <div class="col-sm-8">
                                   <fieldset disabled>
                               <input type="text" name="asignatura" id="asignatura" class="form-control" value="">
                                </fieldset>
                              </div>
                               </div>   
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </div>
                 </form>
                  </div>
                 
            </div>
        </div>
    </div>
 <!--/VENTANA MODAL PARA ELIMINAR ASIGNATURA PROFESOR COMPARTIDO-->