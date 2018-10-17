<!--obtiene la plantilla base que se encuetra en views/main-->
@extends('main')
@section('botonNavCatalogos')
{{ 'active' }}
@endsection
<!--Inicia el contenido para cátalogos-->
@section('contenido')
  <!--SECCIÓN DE GESTION-->
    <div id="seccionGestion" class="container">
    </div><br>
    <!--/SECCIÓN DE GESTION-->

<!--Mostrar datos de tics, mecatronica, industrial-->
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header  carCatalogos texTituloCar">
                  {{ $tics->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/TIC.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaTics as $ch)
                          @if($ch->profesor->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC:{{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}}</div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $tics->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                </div>
                <a  href="/verCarrera/{{$tics->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $meca->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/Mecatronica.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                      @foreach($cargaHorariaMeca as $ch)
                        @if($ch->profesoresCH->tipoProfesor=='PTC')
                          <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                        @endif
                        @if($ch->profesoresCH->tipoProfesor=='PA') 
                          <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                        @endif
                      @endforeach
                        <div class="textImgTitulo">{{ $meca->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                </div>
                <a  href="/verCarrera/{{$meca->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $industrial->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/Industrial.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaIndustrial as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $industrial->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$industrial->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
  </div>
</div><br>

<!--Mostrar datos de Negocios, Gestion empresarial, Alimentos-->
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $negocios->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/negociosGestionEmpresarial.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaNegocios as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $negocios->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$negocios->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $gestionEnpresarial->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/GestiondeProyectos.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaTGestionE as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $gestionEnpresarial->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$gestionEnpresarial->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $alimentos->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/Alimentos.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaAlimentos as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $alimentos->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$alimentos->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
  </div>
</div><br>

<!--Mostrar datos de tics, mecatronica, industrial-->
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $agricultura->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/Agricultura.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaAgricultura as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $agricultura->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$agricultura->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $mantenimiento->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/Mantenimiento.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaMantenimiento as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $mantenimiento->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$mantenimiento->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="row">
        <div class="col-mn-4">
              <div class="card carMargin">
                <div class="card-header carCatalogos texTituloCar">
                  {{ $conta->nombreProgramaEducativo }}
                </div>
                <div class="card-body">
                  <div class="containerImg">
                    <img src="{{ asset('images/Contaduria.png') }}" alt="" class="imageImg">
                    <div class="overlayImg">
                        @foreach($cargaHorariaConta as $ch)
                          @if($ch->profesoresCH->tipoProfesor=='PTC')
                            <div class="textImgPTC">Profesores PTC: {{$ch->count()}}</div><br>
                            @else
                            <p class="text-muted">No hay prefesores PTC.</p>
                          @endif
                          @if($ch->profesoresCH->tipoProfesor=='PA') 
                            <div class="textImg">Profesores PA:{{$ch->count()}} </div><br>
                          @endif
                        @endforeach
                        <div class="textImgTitulo">{{ $conta->nombreProgramaEducativo }}</div> 
                      </div>
                    </div>
                    
                </div>
                <a  href="/verCarrera/{{$conta->id}}" class="btn btn-primary">Ver más...</a>
              </div>
        </div>
      </div>
    </div>
  </div>
</div><br>
    
@endsection