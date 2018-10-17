$(document).ready(function () {
    //consulta dinamica para las especialidades
    $(".modal-body #programaEducativo").bind("change",function(event){
       var idPrograma=event.target.value;
       $.getJSON("/json-especialidades?id_programa_educativo="+idPrograma,function(data){
          $(".modal-body #especialidad").empty(); 
           $(".modal-body #especialidad").append('<option value="0" >Selecciona</option>');
            $.each(data,function(i,esp){
              $(".modal-body #especialidad").append("<option value="+esp.id+" >"+esp.nombreEspecialidad+"</option>"); 
           });
       }); 
    });
    //consulta dinamica para los cuatrimestres 
    $(".modal-body #especialidad").bind("change",function(event){
       var idEspecialidad=event.target.value;
       $.getJSON("/json-cuatrimestres?id_especialidad="+idEspecialidad,function(data){
          $(".modal-body #cuatrimestre").empty(); 
           $(".modal-body #cuatrimestre").append('<option value="0" >Selecciona</option>');
            $.each(data,function(i,cuatri){
              $(".modal-body #cuatrimestre").append("<option value="+cuatri.id+" >"+cuatri.nombreCuatrimestre+"</option>"); 
           });
       }); 
    });
    //consulta dinamica para los asignaturas 
    $(".modal-body #cuatrimestre").bind("change",function(event){
       var idcuatrimestre=event.target.value;
       var idEspecialidad=$(".modal-body #especialidad").val();
       $.getJSON("/json-asignaturas?id_cuatrimestre="+idcuatrimestre+"&id_especialidad="+idEspecialidad,function(data){
          $(".modal-body #asignatura").empty(); 
           $(".modal-body #asignatura").append('<option value="0" >Selecciona</option>');
            $.each(data,function(i,asig){
              $(".modal-body #asignatura").append("<option value="+asig.id+" >"+asig.nombreAsignatura+"</option>"); 
           });
       }); 
    });

    //este es el bueno
    /*$("#programaEducativo").change(function(event){
        alert("funciona");
       var idPrograma=event.target.value;
       $.getJSON("/json-especialidades?id_programa_educativo="+idPrograma,function(data){
          $("#especialidad").empty(); 
           $("#especialidad").append('<option value="0" >Selecciona</option>');
            $.each(data,function(i,esp){
              $("#especialidad").append("<option value="+esp.id+" >"+esp.nombreEspecialidad+"</option>"); 
           });
       }); 
    });*/
    //este es el bueno 
    /*$("#programaEducativo").change(function (e) {
        var id_programa_educativo = e.target.value;
        $.get("/json-especialidades?id_programa_educativo=" + id_programa_educativo + "", function (data) {
            $("#especialidad").empty();
            $("#especialidad").append('<option value="0">Hola</option>');
            $.each(data, function (index, objEsp) {
                $("#especialidad").append('<option value="' + objEsp.id + '">' + objEsp.nombreEspecialidad + '</option>');
            });
        });
    });*/
});
   /*$("#programaEducativo").change(function(event){
       $("#especialidad").append("<option value='1'>Va bien</option>");
       $.get("especialidades/"+event.target.value+"",function(response,programa){
            $("#especialidad").empty();
           for(i=0;i<response.length;i++){
               $("#especialidad").append("<option value='"+response[i].id+"' >"+response[i].nombreEspecialidad+"</option>");
           }
       });
   });*/
    
 /**/