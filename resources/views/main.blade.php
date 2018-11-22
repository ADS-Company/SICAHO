<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Icono de la pagina web-->
    <link rel="icon" href="{{ asset('images/icono_logo_SICAHO_ver.ico') }}">
    
    <!--Sección de bootstrap-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!--Sección de fontawesome-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--Sección de hojas de estilo-->
    <link rel="stylesheet" href="{{ asset('css/style_contenedor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_modales_profesor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_bienvenido.css') }}">
     <!--Sección de styles para datatable-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
    <title>SICAHO</title>
    
</head>

<body>
    <!--BARRA DE NAVEGACION-->
    <nav id="barraNavegacion" class="navbar fixed-top navbar-expand-lg ">
        <a class="navbar-brand" href="{{ url('/inicio') }}">
      <img id="logoSicaho" src="{{ asset('images/logo_SICAHO_verde.png') }}" alt="SICAHO">
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i id="btnCollapse" class="fa fa-bars" aria-hidden="true"></i>
  </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @yield('botonNavCargaHoraria','')">
                    <a class="nav-link" href="{{ url('/cargaHoraria') }}">Carga horaria</a>
                </li>
                <li class="nav-item @yield('botonNavProfesores','')">
                    <a class="nav-link" href="{{ url('/profesores') }}">Profesores</a>
                </li>
                <li class="nav-item @yield('botonNavCarrreras','')">
                    <a class="nav-link" href="{{ url('/carreras') }}">Carreras</a>
                </li>
                <li class="nav-item @yield('botonNavAsignaturas','')">
                    <a class="nav-link" href="{{ url('/asignaturas') }}">Asignaturas</a>
                </li>
                <li class="nav-item @yield('botonNavCatalogos','')">
                    <a class="nav-link" href="{{ url('/catalogos') }}">Catálogos</a>
                </li>
                <li class="nav-item @yield('botonNavProfesoresCompartidos','')">
                    <a class="nav-link" href="{{ url('/profesores_compartidos') }}">Profesores compartidos</a>
                </li>
                <li class="nav-item @yield('botonNavUsuarios','')">
                    <a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a>
                </li>

            </ul>
            <div id="seccionUser">
                   <div class="form-inline">
                    </div>
                    <i class="fa fa-user-circle-o fa-2x"></i>
                    </div>
                    <div class="btn-group">
                        <button type="button"  class="drpUser dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }} 
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/usuarios/{{Auth::user()->id}}">Ver perfil</a>
                            <div class="dropdown-divider"></div>
                            <form method="post" action="{{ route('logout') }}">
                            @csrf
                            
                            <li class="dropdown-item"><button class="btn btn-danger"><i class="fa fa-sign-out"></i>Cerrar sesión</button></li>
                            </form>
                        </div>
                </div>
        </div>
    </nav>
    <!--/BARRA DE NAVEGACION-->
    <!--CONTENIDO-->
    <div class="container">
  @yield('contenido')

   </div>
   <br><br>
    <!--/CONTENIDO-->
        <!--SECCIÓN DE FOOTER-->
    <footer class="footer container-fluid">
        <div class="container" >
            <span class="text-muted">Derechos reservados | Universidad Tecnológica de Tecamachalco &copy;2018.</span>
        </div>
    </footer>
    <!--/SECCIÓN DE FOOTER-->
    
    <!--SCRIPTS DE BOOTSTRAP Y JQUERY-->
     <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
     <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!--/SCRIPTS DE BOOTSTRAP Y JQUERY-->
    
    <!--SCRIPTS JQUERY PARA DATATABLE-->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <!--/SCRIPTS JQUERY PARA DATATABLE-->
      
     <!--SCRIPTS DE LA APLICACIÓN-->
    <script type="text/javascript" src="{{ asset('js/scriptProfesores.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/scriptPerfilProfesores.js')}}"></script>
     <script type="text/javascript" src="{{ asset('js/scriptCombobox.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/scriptTablas.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/scriptUsuarios.js')}}"></script>
     <!--/SCRIPTS DE LA APLICACIÓN-->
</body>

</html>