
  <!--VENTANA MODAL PARA NUEVO PROFESOR-->
    <div class="modal fade" id="ModalNuevoProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">NUEVO PROFESOR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form class="formNuevoProfesor" method="post" action="{{route('nuevoProfesor')}}" novalidate>
                      {{ csrf_field() }}
                       <p class="text-muted">(*) El campo es obligatorio.</p>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                         <label for="clave">(*)Clave:</label>
                                   </div>
                                   <div class="col-md-6">
                                       <input type="text" id="clave" class="form-control mt-1" name="clave" placeholder="Escriba la clave del profesor" required>
                                <!--evaluar si trae un error referente a el input-->
                                <div class="invalid-feedback">
                                   Debe rellenar el campo clave.
                                </div>
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                   <label for="nombre">(*)Nombre:</label>
                                   </div>
                                   <div class="col-md-6">
                                    <input type="text" id="nombre" placeholder="Escriba el nombre" name="nombre" class="form-control mt-1" required>
                                <!--evaluar si trae un error referente a el input-->
                                <div class="invalid-feedback">
                                   Debe rellenar el campo nombre.
                                </div>
                                   </div>
                               </div>
                                <div class="row align-self-end">
                                   <div class="col-md-4">
                                   <label for="apellidoPaterno">(*)Apellido paterno:</label>
                                   </div>
                                   <div class="col-md-6">
                                   <input type="text" id="apellidoPaterno" name="apellidoPaterno" placeholder=" apellido paterno" class="form-control mt-1" required>
                                <!--evaluar si trae un error referente a el input-->
                                <div class="invalid-feedback">
                                   Debe rellenar el campo apellido paterno.
                                </div>
                                   </div>
                               </div>
                                <div class="row align-self-end">
                                   <div class="col-md-4">
                                     <label for="apellidoMaterno">(*)Apellido materno:</label>
                                   </div>
                                   <div class="col-md-6">
                                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" placeholder="apellido materno" class="form-control mt-1" required>
                                <!--evaluar si trae un error referente a el input-->
                                <div class="invalid-feedback">
                                   Debe rellenar el campo apellido materno.
                                </div>
                                   </div>
                               </div>
                                <div class="row align-self-end">
                                   <div class="col-md-4">
                                   <label for="">(*)Tipo de profesor:</label>
                                   </div>
                                   <div class="col-md-6">
                                   <select class="custom-select my-1 mr-sm-2 cmbNTipoProfesor" id="tipoProfesor" name="tipoProfesor" required>
                                <option selected value="">Seleccione</option>
                                <option value="PTC">PTC</option>
                                <option value="PA">PA</option>
                              </select>
                              <div class="invalid-feedback">
                                   Debe elegir una opción para el tipo de profesor.
                                </div>
                                   </div>
                               </div>            
                 <div class="modal-footer">
                    <button type="submit" id="agregarProfesor" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!--/VENTANA MODAL PARA NUEVO PROFESOR-->
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
( function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('formNuevoProfesor');
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