$(document).ready(function(){
$('#ModalHorasProfesor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la información de los data
  var idProfesor = button.data('id')
  if(idProfesor==""){
      console.log('variable id vacia');
  }else{
      console.log(idProfesor);
  }

  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idProfesor').val(idProfesor)
  
});
    
    //pasa los datos de la fila al modal de actualizar  profesor
$('#ModalActualizarAsignaturaProfesor').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var programa = button.data('programa')
  var especialidad = button.data('especialidad')
  var cuatrimestre = button.data('cuatrimestre')
  var asignatura = button.data('asignatura')
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #programaEducativo').val(programa)
  modal.find('.modal-body #especialidad').val(especialidad)
  modal.find('.modal-body #cuatrimestre').val(cuatrimestre)
  modal.find('.modal-body #asignatura').val(asignatura)
});
    
       //pasa los datos de la fila al modal de eliminar  asignatura
$('#ModalEliminarAsignaturaProfesor').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var id = button.data('id')
  var nombre = button.data('nombre')
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idAsignatura').val(id)
  modal.find('.modal-body #asignatura').val(nombre)

});
    
          //pasa los datos de la fila al modal de eliminar  asignatura
$('#ModalEliminarAsignaturaCompartido').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var id = button.data('id')
  var nombre = button.data('nombre')
  var idCompartido= button.data('idcompartido')  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idAsignatura').val(id)
  modal.find('.modal-body #asignatura').val(nombre)
  modal.find('.modal-body #idProfesorCompartido').val(idCompartido)

});
    
           //pasa los datos de la fila al modal de eliminar  asignatura
$('#ModalEliminarActividadProfesor').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var id = button.data('id')
  var nombre = button.data('nombre')
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idActividad').val(id)
  modal.find('.modal-body #actividad').val(nombre)

});
        //pasa los datos de la fila al modal de actualizar  profesor
    //pasa los datos de la fila al modal de eliminar  asignatura
$('#ModalAgregarAsignaturaCompartido').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var id = button.data('id')
  var nombre = button.data('nombre')
  var idCompartido= button.data('idcompartido')
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idActividad').val(id) 
  modal.find('.modal-body #actividad').val(nombre)
  modal.find('.modal-body #idProfesorCompartido').val(idCompartido)

});
//pasa los datos de la fila al modal de actualizar  profesor
    
$('#ModalEliminarActividadCompartido').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var id = button.data('id')
  var nombre = button.data('nombre')
   var idCompartido= button.data('idcompartido')
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idActividad').val(id)
  modal.find('.modal-body #actividad').val(nombre)
  modal.find('.modal-body #idProfesorCompartido').val(idCompartido)

});
        //pasa los datos de la fila al modal de actualizar  profesor
    
                   //pasa los datos de la fila al modal de eliminar  asignatura
$('#ModalAgregarActividadCompartido').on('show.bs.modal', function (event) {
console.log('modal cargado');
  var button = $(event.relatedTarget) // botón que activo el modal
   //extrae la informacion de los data
  var id = button.data('id')
  var nombre = button.data('nombre')
  var idCompartido= button.data('idcompartido')
  
  /*Actualiza el contenido y pasa los valores que recibio de la tabla todo esto lo pasa al modal*/
  var modal = $(this)
  modal.find('.modal-body #idActividad').val(id) 
  modal.find('.modal-body #actividad').val(nombre)
  modal.find('.modal-body #idProfesorCompartido').val(idCompartido)

});
//pasa los datos de la fila al modal de actualizar  profesor
    

    
    
});