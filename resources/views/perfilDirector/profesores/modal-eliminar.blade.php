 <!--VENTANA MODAL PARA ELIMINAR PROFESOR-->
        <div class="modal fade" id="ModalEliminarProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">ELIMINAR PROFESOR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                <form  method="post" action="{{ route('eliminarProfesorD') }}">
                {{ csrf_field() }}
               <div class="form-inline ">
                    <input class="form-control" type="hidden" id="id" name="id" placeholder="Escriba la clave" value="" >    
                </div>
                  <strong>Desea borrar la información de profesor con clave: </strong> 
                         <fieldset disabled>
                                <input class="form-control" type="text" id="clave" name="clave" value="" >
                        </fieldset>
                
                <div class="modal-footer">
                    <button id="eliminaProfesor" type="submit" class="btn btn-danger" >Confirmar</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
      <!--/VENTANA MODAL PARA ELIMINAR PROFESOR-->