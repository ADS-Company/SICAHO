<!--VENTANA MODAL PARA AGREGAR ACTIVIDAD A PROFESOR-->
   <div class="modal fade" id="ModalAgregarActividadCompartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">AGREGAR ACTIVIDAD A PROFESOR COMPARTIDO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('agregarActividadedCompartido')}}">
                       {{ csrf_field() }}
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                      @if(isset($compartido))
                      <input class="form-control" type="text" id="idProfesorCompartido" name="idProfesorCompartido" placeholder="Escriba la clave" value="">
                      @endif
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
                                       <label for="actividad">(*)Actividad:</label>
                                   </div>
                                   <div class="col-md-6">
                                       {!! Form::select('actividad',$actividades,null,['id'=>'actividad','class'=>'form-control mt-1','placeholder'=>'Selecciona','required']) !!}
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="horasSemanales">(*)Horas por semana:</label>
                                   </div>
                                   <div class="col-md-6">
                                         <input type="number" name="horasSemanales" id="horasSemanales" class="form-control mt-1" required>
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                        <label for="horasCuatrimestrales">(*)Horas por cuatrimestre:</label>
                                   </div>
                                   <div class="col-md-6">
                                       <input type="number" name="horasCuatrimestrales" id="horasCuatrimestrales" class="form-control mt-1" required>
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
    <!--/VENTANA MODAL PARA ACTIVIDAD A PROFESOR-->
    
   <!--VENTANA MODAL PARA ELIMINAR ACTIVIDAD-->
    <div class="modal fade" id="ModalEliminarActividadCompartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">ELIMINAR ACTIVIDAD EXTRA A PROFESOR COMPARTIDO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('eliminarActividadCompartido')}}">
                       {{ csrf_field() }}
                       <!--id de profesor-->
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                      @if(isset($compartido))
                      <input class="form-control" type="text" id="idProfesorCompartido" name="idProfesorCompartido" placeholder="Escriba la clave" value="">
                      @endif
                       <!--id de asignatura-->
                        <input class="form-control" type="hidden" id="idActividad" name="idActividad" placeholder="Escriba la clave" value="" >
                               <div class="row">
                            <div class="col-sm-2">
                                <label for="actividad">Actividad: </label>
                            </div>
                              <div class="col-sm-8">
                                   <fieldset disabled>
                               <input type="text" name="actividad" id="actividad" class="form-control" value="">
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
 <!--/VENTANA MODAL PARA ELIMINAR ACTIVIDAD-->