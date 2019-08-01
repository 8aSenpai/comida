@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Bandeja de entrada</div>

                <div class="card-body mod_card_body">   
                    <div class="row">  
                        <div class="col-md-4 col-sm-12">
                              <nav class="navbar-expand-md">
                                <div class="container sub_mod_card_body"> 
                                    <button class="navbar-toggler ml-auto  custom-toggler" type="button" data-toggle="collapse" data-target="#side_menu" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="side_menu">
                                        <!-- Left Side Of Navbar -->
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ route('admin_ordenes') }}"><button class="btn_home">Ordenes</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('admin_ordenes_anteriores') }}"><button class="btn_home">Ordenes Anteriores</button></a>
                                            </div>   
                                            @admin('super')
                                            <div class="col-12">
                                                <a href="{{ route('admin.menu.cobros') }}"><button class="btn_home">Cobros</button></a>
                                            </div> 
                                            <div class="col-12">
                                                <a href="{{ route('Addprod') }}"><button class="btn_home">Agregar Productos</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('listprod') }}"><button class="btn_home">Ver/Editar Productos</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('desactivados') }}"><button class="btn_home">Productos No Disponibles</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('supcategoria') }}"><button class="btn_home">Categorias</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('adicionales') }}"><button class="btn_home">Adicionales a productos</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('admin.visuales') }}"><button class="btn_home">Visuales</button></a>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('admin.contacto') }}"><button class="btn_home">Contacto</button></a>
                                            </div>
                                            @endadmin
                                        </div> 
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-sm-12 col-md-8"> 
                            <div class="row disp_center">
                                <div class="col-12">
                                    <h3>Bienvenido</h3>
                                </div>
                                <div class="col-12">
                                    <h5>Si es la primera vez que utilizas la plataforma debes seguir estos pasos, para su correcta funcion.</h5>
                                </div>
                                <div class="col-12">
                                    <h5>1.- Dar de alta las categorias de sus productos <a href="{{ route('supcategoria') }}">clic aqui</a></h5>
                                </div>
                                <div class="col-12">
                                    <h5>2.- Ahora puede comenzar a dar de alta a sus productos <a href="{{ route('Addprod') }}">clic aqui</a></h5>
                                </div>
                                <div class="col-12">
                                    <h5>3.- Una vez registrados todos sus productos puede agregar los adicionales de sus respectivos productos <a href="{{ route('adicionales') }}">clic aqui</a></h5>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@section('scripts') 
<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<script src="{{ asset('js/sidebar.js') }}" defer></script>
@endsection