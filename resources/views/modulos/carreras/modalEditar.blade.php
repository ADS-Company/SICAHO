<!--Form para agregar-->
    <div class="modal fade" id="Modal-editar-{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">EDITAR ESPECIALIDAD</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                   <form action="/modalEditCarrera/{$car->id}'" method="POST">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <p class="text-muted">(*) El campo es obligatorio.</p>
                    <input type="text" name="clave" id="clave" value="{{$car->id}}" hidden="true" >
                        <div class="row">
                            <div class="col-md-4">
                                <label for="txtNuevoNombreProgramaEducativo">(*)Nombre especialidad:</label>
                            </div>
                            <div class="col-md-6">
                                 <input class="form-control mt-1" type="text" name="especialidad" value="{{ $car->nombreEspecialidad }}"  id="NuevoNombreProgramaEducativo" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}" title="solo letras. Y máximo 50 caracteres" required="true">
                            </div>
                        </div>
                        <div class="row align-self-end">
                            <div class="col-md-4">
                                <label for="txtAcronimo">(*)Acrónimo:</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control mt-1" type="text" name="acronimo" value="{{ $car->acronimo }}" id="Acronimo" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}" title="solo letras. Y máximo 10 caracteres" required="true">
                            </div>
                        </div>
                        <div class="row align-self-end">
                            <div class="col-md-4">
                                  <label for="chbNuevoEstado">(*)Programa  educativo :</label>
                            </div>
                            <div class="col-md-6 align-self-end">
                                 <select name="ProgramaEducativo" id="pe" class="custom-select my-1 mr-sm-2" required>
                                        <option value="">Seleccione</option>
                                        @foreach($pEducativo as $pe)
                                            <option value="{{ $pe->id }}">{{ $pe->nombreProgramaEducativo }}</option>
                                        @endforeach
                                    </select>
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
