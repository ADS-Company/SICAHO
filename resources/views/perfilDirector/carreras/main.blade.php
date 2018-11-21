<!--obtiene la plantilla base que se encuetra en views/main-->
@extends('mainDirector')
@section('botonNavCarrreras')
{{ 'active' }}
@endsection

<!--Inicia el contenido para carreras-->
@section('contenidoD')
   <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
        <div class="row">
            <div class="col-md-8">
                 @include('PerfilDirector.carreras.error')
            </div>
            <div class="col-md-4">
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#ModalNuevoProfesor">Nueva</button>
            </div>
        </div>
    </div>
    <!--/SECCIÓN DE GESTION-->
        
       

    <!--SECCIÓN DE TABLA-->
      <div class="container" id="seccionTabla">
        <table class="table table-bordered" id="tableCarreras">
            <thead class="thead-tabla" >
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre de la especialidad</th>
                    <th scope="col">Acrónimo</th>
                    <th scope="col">Programa educativo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            @foreach($carreras as $car)
            <tbody>
                <tr>
                    <td>{{ $car->id }}</td>  
                    <td>{{ $car->nombreEspecialidad }}</td>
                    <td>{{ $car->acronimo }}</td>
                    <td>{{ $car->nombreProgramaEducativo }}</td>
                    <td>
                    <a data-target="#Modal-editar-{{$car->id}}" data-toggle="modal"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                    </td>
                    <td>
                    <a href="" data-target="#Modal-Eliminar-{{$car->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                    </td>
                </tr>
            </tbody>
            @include('modulos.carreras.modalEditar')
            @include('modulos.carreras.modalEliminar')
            @endforeach
        </table>
    </div>

        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col col-lg-2">
            </div>
            <div class="col-md-auto">
              {{ $carrera->links('pagination::Bootstrap-4') }}
            </div>
            <div class="col col-lg-2">
            </div>
          </div>
        </div>
    <!--/SECCIÓN DE TABLA-->
      <!--VENTANA MODAL PARA NUEVO CARRERA-->
    <div class="modal fade" id="ModalNuevoProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">NUEVA ESPECIALIDAD</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form class="formNuevaEspecialidad" action="{{ route('Guardar') }}" method="post">
                        {{ csrf_field() }}
                        <p class="text-muted">(*) El campo es obligatorio.</p>
                        <div class="row align-self-end">
                            <div class="col-md-4"><label  for="txtNuevoNombreProgramaEducativo">(*)Nombre especialidad:</label></div>
                            <div class="col-md-6">
                                 <input class="form-control" type="text" name="Nombre"  id="NuevoNombreProgramaEducativo" placeholder="Escriba el nombre" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}" title="solo letras. Y máximo 50 caracteres" required="true">
                                  <!--evaluar si trae un error referente a el input-->
                                <div class="invalid-feedback">
                                   Debe rellenar el campo nombre.
                                </div>
                            </div>
                        </div>
                        <div class="row align-self-end">
                            <div class="col-md-4">
                                <label for="txtAcronimo">(*)Acrónimo:</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control mt-1" type="text" name="Acronimo" id="Acronimo" placeholder="Escriba el acronimo" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}" title="solo letras. Y máximo 10 caracteres" required="true">
                                     <!--evaluar si trae un error referente a el input-->
                                <div class="invalid-feedback">
                                   Debe rellenar el campo acronimo.
                                </div>
                            </div>
                        </div>
                            <div class="row align-self-end">
                                <div class="col-md-4"><label for="chbNuevoEstado">(*)Programa  educativo :</label></div>
                                <div class="col-md-6">
                                    <select name="ProgramaEducativo" id="pEdu" class="custom-select my-1 mr-sm-2" required>
                                        <option value="">Seleccione</option>
                                        @foreach($pEducativo as $pe)
                                            <option value="{{ $pe->id }}">{{ $pe->nombreProgramaEducativo }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                   Debe elegir una opción para el programa educativo.
                                </div>
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
    <!--/VENTANA MODAL PARA NUEVO CARRERA-->    
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
( function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('formNuevaEspecialidad');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection