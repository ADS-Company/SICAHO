        <!--VENTANA MODAL PARA ACTUALIZAR PROFESOR-->
<div class="modal fade" id="ModalActualizarProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">EDITAR PROFESOR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form class="formEditarProfesor" method="post" action="{{route('actualizarProfesorD')}}">
                       {{ csrf_field() }}
                                <input class="form-control" type="hidden" id="id" name="id" value="" >
                        <p class="text-muted">(*) El campo es obligatorio.</p>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="clave">(*)Clave:</label>
                                   </div>
                                   <div class="col-md-6">
                                    <input class="form-control mt-1" type="text" id="clave" name="clave" placeholder="Escriba la clave" required value="" >
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
                                        <input class="form-control mt-1" type="text" id="nombre" placeholder="Escriba el nombre" name="nombre" value="" required>
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
                                     <input class="form-control mt-1" type="text" id="apellidoPaterno" placeholder="Escriba el apellido paterno" name="apellidoPaterno" value="" required>
                                     <div class="invalid-feedback">
                                       Por favor ingrese el apellido paterno.
                                     </div>
                                   </div>
                               </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4">
                                       <label for="apellidoMaterno">(*)Apellido materno:</label>
                                   </div>
                                   <div class="col-md-6">
                                       <input class="form-control mt-1" type="text" id="apellidoMaterno" placeholder="Escriba el apellido materno" name="apellidoMaterno" value="" required>
                                       <!--evaluar si trae un error referente a el input-->
                                        <div class="invalid-feedback">
                                           Debe rellenar el campo apellido materno.
                                        </div>
                                   </div>
                        </div>
                               <div class="row align-self-end">
                                   <div class="col-md-4"><label for="">(*)Programa educativo:</label></div>
                                   <div class="col-md-6">
                                      <input type="text" id="proEdu" name="proEdu" class="form-control mt-1" required value="{{ $carrera }}" disabled>
                                      <!--evaluar si trae un error referente a el input-->
                                      <div class="invalid-feedback">
                                         Debe rellenar el campo tipo de profesor.
                                      </div>
                                   </div>
                               </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </div>
                 </form>
                 </div>
            </div>
        </div>
    </div>
     <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
( function() {
  'use strict';
  window.addEventListener('load', function() {
      
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('formEditarProfesor');
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
    <!--/VENTANA MODAL PARA ACTUALIZAR PROFESOR-->