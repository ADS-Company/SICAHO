 <!--VENTANA MODAL PARA AGREGAR ASIGNATURAS A PROFESOR-->
   <div class="modal fade" id="ModalAgregarAsignaturaProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">AGREGAR HORAS A PROFESOR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('agregarAsignacionAsignatura')}}">
                       {{ csrf_field() }}
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
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
                                      {!! Form::select('especialidad',['placeholder'=>'Selecciona'],null,['id'=>'especialidad','class'=>'form-control mt-1','required']) !!}
                                  </div>
                              </div> 
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="cuatrimestre">(*)Cuatrimestre:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('cuatrimestre',['placeholder'=>'Selecciona'],null,['id'=>'cuatrimestre','class'=>'form-control mt-1','required']) !!}
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="asignatura">(*)Asignatura:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('asignatura',['placeholder'=>'Selecciona'],null,['id'=>'asignatura','class'=>'form-control mt-1','required']) !!}
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
    <!--/VENTANA MODAL PARA HORAS DE PROFESOR-->
    
   <!--VENTANA MODAL PARA ACTUALIZAR ASIGNATURA-->
   <div class="modal fade" id="ModalActualizarAsignaturaProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">Actualizar asignatura ha profesor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('agregarAsignacionAsignatura')}}">
                       {{ csrf_field() }}
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="programaEducativo">Programa educativo:</label>
                                {!! Form::select('programaEducativo',$programasEducativos,null,['id'=>'programaEducativo','class'=>'form-control','placeholder'=>'Selecciona']) !!}
                            </div>
                        </div>
                          <div class="form-inline">
                            <div class="form-group">
                                <label for="programaEducativo">Especialidad:</label>
                                {!! Form::select('especialidad',['placeholder'=>'Selecciona'],null,['id'=>'especialidad','class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="cuatrimestre">Cuatrimestre:</label>
                                {!! Form::select('cuatrimestre',['placeholder'=>'Selecciona'],null,['id'=>'cuatrimestre','class'=>'form-control']) !!}
                            </div>
                        </div>
                         <div class="form-inline">
                            <div class="form-group">
                                <label for="asignatura">Asignatura:</label>
                                {!! Form::select('asignatura',['placeholder'=>'Selecciona'],null,['id'=>'asignatura','class'=>'form-control']) !!}
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
   <!--/VENTANA MODAL PARA ACTUALIZAR ASIGNATURA-->
   
  <!--VENTANA MODAL PARA ELIMINAR ASIGNATURA-->
    <div class="modal fade" id="ModalEliminarAsignaturaProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">Eliminar asignatura ha profesor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('eliminarAsignacionAsignatura')}}">
                       {{ csrf_field() }}
                       <!--id de profesor-->
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                       <!--id de asignatura-->
                        <input class="form-control" type="hidden" id="idAsignatura" name="idAsignatura" placeholder="Escriba la clave" value="" >
                               <div class="row">
                            <div class="col-sm-1">
                                <label for="programaEducativo">Asignatura:</label>
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
 <!--/VENTANA MODAL PARA ELIMINAR ASIGNATURA-->