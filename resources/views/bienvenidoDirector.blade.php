@extends('mainDirector')

@section('contenidoD')
  <div id="seccionBienvenida" class="container">
        <div class="card">
  <div class="card-header">
    <h2 class="text-muted text-center">BIENVENIDO {{ Auth::user()->username }}</h2>
    <h2 class="text-muted text-center">DIRECTOR DE LA CARRERA DE {{ Auth::user()->estado }} </h2>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
     <h5>¡SICAHO! </h5>
      <p>La aplicación web SICAHO (Sistema de Carga Horaria) busca agilizar la tarea de gestión de la carga horaria de los profesores de la Universidad Tecnológica de Tecamachalco. </p>
    </blockquote>
  </div>
</div>
    </div>
@endsection