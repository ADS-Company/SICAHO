$(document).ready(function(){
    //pasa los datos de la fila al modal de actualizar  
$('#ModalActualizarUsuario').on('show.bs.modal', function (event) {
  console.log('modal abierto');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data-
  var id = button.data('id')
  var username = button.data('username')
  var password = button.data('password')
  var rol = button.data('rol')
  var estado = button.data('estado')
   
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idUsuario').val(id)
  modal.find('.modal-body #username').val(username)
  modal.find('.modal-body #password').val(password)
  modal.find('.modal-body #rol').val(rol)
  modal.find('.modal-body #estado').val(estado) 
});
    
    //pasa los datos de la fila al modal de eliminar 
$('#ModalEliminarUsuario').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informaci+on de los data-
  var id = button.data('id')
  var username = button.data('username')
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idUsuario').val(id)
  modal.find('.modal-body #username').val(username)
});
 
    
});


