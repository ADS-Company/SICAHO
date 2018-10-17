<h2>MENÚ</h2>
<ul class="nav nav-pills" id="pills-tab" role="tablist" style="">
  @foreach($car as $count =>$c)
  <li class="nav-item tabCar" > 
   <!--@if($count == 0) class="nav-link active" @endif -->
    <a class="nav-link " data-toggle="tab" href="#tab-{{$c->id}}" role="tab" aria-controls="tab-{{$c->id}}"><p id="tabCarreras">{{$c->nombreProgramaEducativo}}</p></a>
  </li>
  @endforeach
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane" id="tab-9" role="tabpanel" aria-labelledby="tabTic">@include('modulos.cargaHoraria.chTic')</div>
  <div class="tab-pane" id="tab-8" role="tabpanel" aria-labelledby="tabIndu">@include('modulos.cargaHoraria.chIndustrial')</div>
  <div class="tab-pane" id="tab-7" role="tabpanel" aria-labelledby="tabMan">@include('modulos.cargaHoraria.chMantenimiento')</div>
  <div class="tab-pane" id="tab-6" role="tabpanel" aria-labelledby="tabMeca">@include('modulos.cargaHoraria.chMeca')</div>
  <div class="tab-pane" id="tab-5" role="tabpanel" aria-labelledby="tabAli">@include('modulos.cargaHoraria.chAlimentos')</div>
  <div class="tab-pane" id="tab-4" role="tabpanel" aria-labelledby="tabConta">@include('modulos.cargaHoraria.chContabilidad')</div>
  <div class="tab-pane" id="tab-3" role="tabpanel" aria-labelledby="tabNeg">@include('modulos.cargaHoraria.chNegocios')</div>
  <div class="tab-pane" id="tab-2" role="tabpanel" aria-labelledby="tabGP">@include('modulos.cargaHoraria.chGesPro')</div>
  <div class="tab-pane" id="tab-1" role="tabpanel" aria-labelledby="tabAgri">@include('modulos.cargaHoraria.chAgricultura')</div>
</div>
<style>
  .tab-pane{
    background-color: #fff;
    color: #000;
  }
  #tabCarreras{
    color: #000;
    font-size: 15px;
  }

</style>

