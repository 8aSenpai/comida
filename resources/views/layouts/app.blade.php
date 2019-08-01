<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @foreach ($visuales as $tit)
    <title>{{ $tit->titulo }}</title>
    @endforeach
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comcss.css') }}" rel="stylesheet">
    @yield('styles')  
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/6ec9eab5b1.js"></script>
</head>
<body> 
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @foreach ($visuales as $tit2)
                    {{ $tit->titulo }}
                    @endforeach
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto"> 
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('ordenes') }}" >
                                {{ __('Ordenes') }}
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('carrito') }}" >
                            @if($contcarrito != 0)
                            <span class="car_cont">{{ $contcarrito }}</span><i style="color: red !important;" class="fas fa-shopping-cart"></i>
                            @endif
                            {{ __('Carrito') }}
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
 
            @yield('content')  
        @foreach ($visuales as $rex)
        <footer id="footer" class="footer bg-light ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a style="color: red !important;" href="{{ route('acerca.de') }}">Acerca de</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a style="color: red !important;" href="{{ route('contacto') }}">Contacto</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a style="color: red !important;" href="{{ route('terminos.uso') }}">Terminos de Uso</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a style="color: red !important;" href="{{ route('politicas.privacidad') }}">Política de Privacidad</a></li>
                    </ul>
                    <p style="color: red !important;" class="text-muted small mb-4 mb-lg-0">© Copyright 2019 najeraasociados</p>
                </div>
                <div class="col-lg-6 my-auto h-100 text-center text-lg-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ $rex->facebook }}"><i style="color: red !important;" class="fab fa-facebook-square fa-2x"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $rex->twitter }}"><i style="color: red !important;" class="fab fa-twitter fa-2x"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $rex->instagram }}"><i style="color: red !important;" class="fab fa-instagram fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @endforeach
    @yield('scripts')  
</body>
</html>
