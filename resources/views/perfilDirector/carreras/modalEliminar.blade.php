  <!--Form para Eliminar-->
    <div class="modal fade" id="Modal-Eliminar-{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">ELIMINAR ESPECIALIDAD.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('destroyCarrera', $car->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="text" name="clave" id="clave" value="{{$car->id}}" hidden="true">
                        <div class="container">
                            <div class="modal-body">
                             <p>
                              Se borrara la información de la especialidad: <strong>{{ $car->nombreEspecialidad }}</strong>
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




<!--<div class="modal fake modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="1" id="Modal-Eliminar-{{$car->id}}">
 <form action="{{ route('destroyCarrera', $car->id) }}" method="POST">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Eliminar Categoría</h4>
     <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden>x</span>
     </button>
    </div>
    <div class="modal-body">
     <p>
      Confirme si desea Eliminar <strong>{{ $car->nombreEspecialidad }}</strong>
     </p>
    </div>
    <div class="modal-footer">
     <button type="submit" class="btn btn-primary">Cofirmar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
   </div>
  </div>
 </form>
</div>﻿-->
 <!--SECCIÓN DE GESTION-->