<!--obtiene la plantilla base que se encuetra en views/main-->
@extends('main')
@section('botonNavCargaHoraria')
{{ 'active' }}
@endsection
<!--Inicia el contenido para cargahoraria-->
@section('contenido')

    <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
        <div class="row">
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <!--/SECCIÓN DE GESTION-->


    @include('modulos.cargaHoraria.tabs')

    <!--/SECCIÓN DE TABLA-->
    <br>
    <br>
@endsection