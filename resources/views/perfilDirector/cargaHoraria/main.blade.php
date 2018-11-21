<!--obtiene la plantilla base que se encuetra en views/main-->
@extends('mainDirector')
@section('botonNavCargaHoraria')
{{ 'active' }}
@endsection
<!--Inicia el contenido para cargahoraria-->
@section('contenidoD')

    <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
        <div class="row">
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <!--/SECCIÓN DE GESTION-->


    @include('perfilDirector.cargaHoraria.tabs') 

    <!--/SECCIÓN DE TABLA-->
    <br>
    <br>
@endsection