$('#carrera').on('change', function(e){
       //alert(e.target.value);
       var idcarrera = e.target.value;
       if (idcarrera == '0') {
          $('#especialidad').prop('disabled',true);
          $('#cuatri').prop('disabled',true);
       }
         $.get("/json-Carreras?id_programa_educativo="+idcarrera, function(data){
         		console.log(data);
         		$('#especialidad').empty();
         		$('#especialidad').append('<option value="0" disabled="true" selected="true">Elija...</option>');

         		$.each(data, function(index, espeOjb){
         			$('#especialidad').append('<option value="'+ espeOjb.id +'">'+espeOjb.nombreEspecialidad+'</option>');
         		});
  		    });
});

$('#especialidad').on('change', function(e){
       alert(e.target.value);
       var idEspe = e.target.value;
       $.get("/json-Cuatri?id_especialidad="+idEspe, function(data){
       		console.log(data);
       		$('#cuatri').empty();
       		$('#cuatri').append('<option value="0" disabled="true" selected="true">Elija...</option>');

       		$.each(data, function(index, cuatriOjb){
       			$('#cuatri').append('<option value="'+ cuatriOjb.id +'">'+cuatriOjb.nombreCuatrimestre+'</option>');
       		});
		});
});

//Script para los select de la ventana modal de editar Asignatura
$('#programa_educativo').change(function(e){
       var idcarreraE = e.target.value;
       alert(idcarreraE);
       $.get("/json-CarrerasE?id_programa_educativo="+idcarreraE, function(dataE){
            //alert(dataE);
            console.log(dataE);
            $('#especialidadEs').empty();
            $('#especialidadEs').append('<option value="0" disabled="true" selected="true">Elija...</option>');

            $.each(dataE, function(index, espeEOjb){
              $('#especialidadEs').append('<option value="'+ espeEOjb.id +'">'+espeEOjb.nombreEspecialidad+'</option>');
            });
      })
});

$('#especialidadEs').on('change', function(e){
       alert(e.target.value);
       var idEspeE = e.target.value;
       $.get("/json-CuatriE?id_especialidad="+idEspeE, function(dataE){
          console.log(dataE);
          $('#cuatrimestre').empty();
          $('#cuatrimestre').append('<option value="0" disabled="true" selected="true">Elija...</option>');

          $.each(dataE, function(index, cuatriEOjb){
            $('#cuatrimestre').append('<option value="'+ cuatriEOjb.id +'">'+cuatriEOjb.nombreCuatrimestre+'</option>');
          });
    });
});
