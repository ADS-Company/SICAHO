  <!--Form para Eliminar-->
    <div class="modal fade" id="Modal-Eliminar-{{$esp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">ELIMINAR ESPECIALIDAD.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('destroyCarreraD', $esp->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="text" name="clave" id="clave" value="{{$esp->id}}" hidden="true">
                        <div class="container">
                            <div class="modal-body">
                             <p>
                              Se borrara la información de la especialidad: <strong>{{ $esp->nombreEspecialidad }}</strong>
                             </p>
                            </div>
                         </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Confirmar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--/VENTANA MODAL PARA Eliminar-->
