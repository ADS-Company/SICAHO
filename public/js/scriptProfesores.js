$(document).ready(function(){
    //pasa los datos de la fila al modal de actualizar  profesor
$('#ModalActualizarProfesor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data-
  var id = button.data('id')
  var clave = button.data('clave')
  var nombre = button.data('nombre')
  var apellidoPaterno = button.data('apellidopaterno')
  var apellidoMaterno = button.data('apellidomaterno')
  var tipoProfesor = button.data('tipoprofesor')
  
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #clave').val(clave)
  modal.find('.modal-body #nombre').val(nombre)
  modal.find('.modal-body #apellidoPaterno').val(apellidoPaterno)
  modal.find('.modal-body #apellidoMaterno').val(apellidoMaterno) 
  modal.find('.modal-body #tipoProfesor').val(tipoProfesor)
});
    
    //pasa los datos de la fila al modal de eliminar profesor
$('#ModalEliminarProfesor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informaci+on de los data-
  var id = button.data('id')
  var clave = button.data('clave')
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #clave').val(clave)
});
 
    
});


