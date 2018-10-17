<!--obtiene la plantilla base que se encuetra en views/main-->
@extends('main')
@section('botonNavCatalogos')
{{ 'active' }}
@endsection
<!--Inicia el contenido para cargahoraria-->
@section('contenido')
    <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
    </div>
    <!--/SECCIÓN DE GESTION-->
    <!--Tabla de tic-->
    @if(isset($cargaHorariaTics))
        @include('modulos.catalogos.tablaTic')
        <!--tabla de mecatronica-->
    @elseif(isset($cargaHorariaMeca))
        @include('modulos.catalogos.tablaMeca')
        <!--tabla de Industrial-->
    @elseif( isset($cargaHorariaIndu))
        @include('modulos.catalogos.tablaIndustrial')
        <!--tabla de Negocios-->
    @elseif(isset($cargaHorariaNeg))
        @include('modulos.catalogos.tablaNegocios')
        <!--tabla de Gestion de Proyectos-->
    @elseif(isset($cargaHorariaGesE))
        @include('modulos.catalogos.tablaGesPro')
        <!--tabla de Alimentos-->
    @elseif(isset($cargaHorariaAli))
        @include('modulos.catalogos.tablaAlimentos')
        <!--tabla de Agricultura-->
    @elseif(isset($cargaHorariaAgri))
        @include('modulos.catalogos.tablaAgricultura')
        <!--tabla de Mantenimiento-->
    @elseif(isset($cargaHorariaMante))
        @include('modulos.catalogos.tablaMantenimiento')
        <!--tabla de Contabilidad-->
    @elseif(isset($cargaHorariaConta))
        @include('modulos.catalogos.tablaContabilidad')
    @else
    <p>No hay ninguna carrera</p>
    @endif

@endsection