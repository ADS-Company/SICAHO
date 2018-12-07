    <!--Form para agregar-->
    <div class="modal fade" id="Modal-editar-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">EDITAR ASIGNATURA</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form action="/modalEditAsignaturaD/{$value->id}'" method="POST"> 
                        {{ method_field('POST') }}
                        {{ csrf_field() }}
                        <input type="text" name="clave" id="clave" value="{{$value->id}}" hidden="true">
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
                                               <label for="NombreAsignatura">(*)Nombre de asignatura:</label>
                                           </div>
                                           <div class="col-md-6 align-self-end">
                                               <input class="form-control mt-1" type="text" name="nombreAsignatura" id="txtNombreAsignatura" value="{{$value->nombreAsignatura}}" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}" title="solo letras. Y máximo 50 caracteres" required>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-4">
                                               <label for="HorasSemanales">(*)Horas por semana:</label>
                                           </div>
                                           <div class="col-md-6 align-self-end">
                                                <input class="form-control mt-1" type="text" name="HorasSemanales" id="txtHorasSemanales" value="{{$value->horasSemanales}}" pattern="^[0-9]{1,2}" title="solo numeros. Y máximo 2 dígitos" required>
                                           </div>
                                       </div>
                                       <div class="row align-self-end">
                                           <div class="col-md-4">
                                               <label for="HorasCuatrimestre">(*)Horas por cuatrimestre:</label>
                                           </div>
                                           <div class="col-md-6">
                                               <input class="form-control mt-1" type="text" name="HorasCuatrimestre" id="txtHorasCuatrimestre" value="{{$value->horasCuatrimestrales}}" pattern="^[0-9]{1,4}" title="solo numeros. Y máximo 4 dígitos" required>
                                           </div>
                                       </div>
                        <div class="modal-footer">
                           <input type="submit" class="btn btn-info" value="Guardar">
                            <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--/VENTANA MODAL PARA NUEVA ASIGNATURA-->

