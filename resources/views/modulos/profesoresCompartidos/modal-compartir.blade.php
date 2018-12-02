 <!--VENTANA MODAL PARA HORAS DE PROFESOR-->
   <div class="modal fade" id="ModalCompartirProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">AGREGAR HORAS A PROFESOR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('compartirProfesor')}}">
                       {{ csrf_field() }}
                      <input class="form-control" type="hidden" id="idProfesor" name="idProfesor" placeholder="Escriba la clave" value="{{$profesor->id}}" >
                              <p class="text-muted">(*) El campo es obligatorio.</p>
                              <div class="row">
                                  <div class="col-md-4">
                                       <label for="">(*)Programa educativo:</label>
                                  </div>
                                  <div class="col-md-6">
                                     {!! Form::select('programaEducativo',$programasEducativos,null,['id'=>'programaEducativo','class'=>'form-control mt-1','placeholder'=>'Selecciona','required']) !!}
                                  </div>
                              </div>
                            <div class="row">
                                  <div class="col-md-4">
                                      <label for="horasCedidas">(*)Horas cedidas:</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="number" name="horasCedidas" id="horasCedidas" class="form-control mt-1" required >
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