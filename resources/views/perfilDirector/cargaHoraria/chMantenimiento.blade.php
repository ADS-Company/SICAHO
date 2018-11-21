<h3 class="TituloCarrerasPagina">{{$mantenimiento->nombreProgramaEducativo}}</h3>
<div class="card-body">
                <h2>Profesores de tiempo completo</h2>
                <table class="table table-bordered" id="tableCarManPTC">
                    <thead class="thead-tabla">
                        <tr>
                            <th scope="col">Clave</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo profesor</th>
                            <th scope="col">Horas totales</th>
                            <th scope="col">Horas Restantes</th>
                            <th scope="col">Ver perfil</th>
                        </tr>

                    </thead>
                    
                    <tbody>@forelse($cargaHorariaMentenimiento as $ch)
                        @if($ch->profesoresCH->tipoProfesor=='PTC')
                        <tr>
                            <td>{{ $ch->id }}</td>
                            <td>{{ $ch->profesoresCH->nombre }} {{ $ch->profesoresCH->apellidoPaterno }} {{ $ch->profesoresCH->apellidoMaterno }}</td>
                            <td>{{ $ch->profesoresCH->tipoProfesor }}</td>
                            <td>{{ $ch->horasTotales }}</td>
                            <td>{{ $ch->horasDisponibles }}</td>
                            <td><a class=" btn btn-info btn-sm textVerperfil" href="/profesores/{{$ch->profesoresCH->id}}" ><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                        @endif
                        </tr>@empty
                    @endforelse
                    </tbody>
                    
                </table>
                    <div class="container">
                      <div class="row justify-content-md-center">
                        <div class="col col-lg-2">
                        </div>
                        <div class="col-md-auto">
                           {{ $cargaHorariaMentenimiento->links('pagination::Bootstrap-4') }}
                        </div>
                        <div class="col col-lg-2">
                        </div>
                      </div>
                    </div>
              </div>

              <br><br>

              <div class="card-body">
                <h2>Profesores por asignatura</h2>
                <table class="table table-bordered" id="tableCarManPA">
                    <thead class="thead-tabla">
                        <tr>
                            <th scope="col">Clave</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo profesor</th>
                            <th scope="col">Horas totales</th>
                            <th scope="col">Horas Restantes</th>
                            <th scope="col">Ver perfil</th>
                        </tr>

                    </thead>
                    
                    <tbody>@forelse($cargaHorariaMentenimiento as $ch)
                        @if($ch->profesoresCH->tipoProfesor=='PA')
                        <tr>
                            <td>{{ $ch->id }}</td>
                            <td>{{ $ch->profesoresCH->nombre }} {{ $ch->profesoresCH->apellidoPaterno }} {{ $ch->profesoresCH->apellidoMaterno }}</td>
                            <td>{{ $ch->profesoresCH->tipoProfesor }}</td>
                            <td>{{ $ch->horasTotales }}</td>
                            <td>{{ $ch->horasDisponibles }}</td>
                            <td><a class=" btn btn-info btn-sm textVerperfil" href="/profesores/{{$ch->profesoresCH->id}}" ><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                        @endif
                        </tr>@empty
                    @endforelse
                    </tbody>
                    
                </table>
                    <div class="container">
                      <div class="row justify-content-md-center">
                        <div class="col col-lg-2">
                        </div>
                        <div class="col-md-auto">
                           {{ $cargaHorariaMentenimiento->links('pagination::Bootstrap-4') }}
                        </div>
                        <div class="col col-lg-2">
                        </div>
                      </div>
                    </div>
              </div>
