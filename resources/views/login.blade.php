<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SICAHO</title>

       <!--Sección de fontawesome-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <!--/Sección de fontawesome-->
        
        <!--Sección de bootstrap-->
           <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
       
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
         <!--/Sección de bootstrap-->
                         
        <!--HOJAS DE ESTILO-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/style_login.css')}}">
        <!--/HOJAS DE ESTILO-->
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
     <div class="container-fluid">
       <img src="{{asset('images/logo_SICAHO_verde.png')}}" alt="SICAHO">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                 <!--Recibe un mensaje si se intento acceder a un
                 página sin logearse-->
                  @if(session()->has('flash'))
                  <div class="alert alert-warning">{{session('flash')}}</div>
                  @endif
                   <div class="card login_box">
                <div class="card-header"><h4>INGRESE AL SISTEMA</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label text-md-right">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autofocus>
                                <!--evaluar si trae un error referente a el input-->
                                 @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('password') ? 'has-error' : ''}}">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autofocus >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" id="btnIngresar" class="btn btn-block">Ingresar</button>
                            </div>
                        </div>
                         <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
