 <!--VENTANA MODAL PARA HORAS DE PROFESOR-->
   <div class="modal fade" id="ModalHorasProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">AGREGAR HORAS A PROFESOR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('agregarHorasD')}}">
                       {{ csrf_field() }}
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                              <p class="text-muted">(*) El campo es obligatorio.</p>
                              <div class="row">
                                  <div class="col-md-4">
                                       <label for="">Programa educativo:</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control mt-1" value="{{ $profesor->programaEducativo->nombreProgramaEducativo }}" required disabled>
                                  </div>
                              </div>
                            <div class="row"> 
                                  <div class="col-md-4">
                                      <label for="horasTotales">Horas totales:</label>
                                  </div> 
                                  <div class="col-md-6">
                                      <input type="number" name="horasTotales" id="horasTotales" class="form-control mt-1" required >
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
  <!--VENTANA MODAL PARA ELIMINAR CARGA HORARIA DE PROFESOR-->
    <div class="modal fade" id="ModalEliminarCargaHoraria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">ELIMINAR LA CARGA HORARIA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('eliminarCargaHoraria')}}">
                       {{ csrf_field() }}
                       <!--id de profesor-->
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="" value="{{$profesor->id}}" >
                       <!--id de asignatura-->
                        
                              <div class="row">
                                  <h5>Desea borrar la carga horaria del profesor {{$profesor->nombre}} {{$profesor->apellidoPaterno}} {{$profesor->apellidoMaterno}}, incluyendo sus asignaturas y actividades</h5>
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
 <!--/VENTANA MODAL PARA ELIMINAR CARGA HORARIA DE PROFESOR-->