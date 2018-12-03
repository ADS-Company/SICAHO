    <div style="text-align: center;">
        <h4>{{ Auth::user()->estado }} </h4>
    </div>
    <h2>Profesores de tiempo completo</h2><br>
     <!--SECCIÓN DE TABLA-->
      <div class="container" id="seccionTabla">
        <table class="table table-bordered">
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
            
            <tbody>
              @forelse($profesor as $ch)
                  @if($ch->profesoresCH->tipoProfesor=='PTC')
                  <tr>
                      <td>{{ $ch->id }}</td>
                      <td>{{ $ch->profesoresCH->nombre }} {{ $ch->profesoresCH->apellidoPaterno }} {{ $ch->profesoresCH->apellidoMaterno }}</td>
                      <td>{{ $ch->profesoresCH->tipoProfesor }}</td>
                      <td>{{ $ch->horasTotales }}</td>
                      <td>{{ $ch->horasDisponibles }}</td>
                      <td><a class=" btn btn-info btn-sm textVerperfil" href="/profesorD/{{$ch->profesoresCH->id}}" ><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                  @endif
                  </tr>@empty
              @endforelse
              </tbody>
        </table>
    </div>
    <!--/SECCIÓN DE TABLA-->
    <br>
    <br>
    <h2>Profesores por asignatura</h2>
    <!--SECCIÓN DE TABLA-->
      <div class="container" id="seccionTabla">
        <table class="table table-bordered">
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
            
            <tbody>
                @forelse($profesor as $ch)
                  @if($ch->profesoresCH->tipoProfesor=='PA')
                  <tr>
                      <td>{{ $ch->id }}</td>
                      <td>{{ $ch->profesoresCH->nombre }} {{ $ch->profesoresCH->apellidoPaterno }} {{ $ch->profesoresCH->apellidoMaterno }}</td>
                      <td>{{ $ch->profesoresCH->tipoProfesor }}</td>
                      <td>{{ $ch->horasTotales }}</td>
                      <td>{{ $ch->horasDisponibles }}</td>
                      <td><a class=" btn btn-info btn-sm textVerperfil" href="/profesorD/{{$ch->profesoresCH->id}}" ><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                  @endif
                  </tr>@empty
              @endforelse
            </tbody>
            
        </table>
    </div>
    <!--/SECCIÓN DE TABLA-->
    <br>
    <br>