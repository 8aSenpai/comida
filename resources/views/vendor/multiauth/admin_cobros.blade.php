@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Bandeja de entrada</div>
                
                <div class="card-body mod_card_body"> 
                    <!-- Body -->
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
                                            @endadmin
                                        </div> 
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-sm-12 col-md-8 ad_cobro_men_fix"> 
                            <div class="row disp_center ad_cobro_head">
                                    <div class="col-4 ad_cobro_men">
                                    <a href="{{ route('admin.cobro.efectivo') }}" class="ad_cobro_hrf"><button class="ad_cobro_btn">Efectivo</button></a> 
                                </div>
                                <div class="col-4 ad_cobro_men">
                                    <a href="{{ route('admin.cobro.tarjeta') }}" class="ad_cobro_hrf"><button class="ad_cobro_btn">Tarjeta</button></a> 
                                </div>
                                <div class="col-4 ad_cobro_men">
                                    <a href="{{ route('admin.cobro.consulta') }}" class="ad_cobro_hrf"><button class="ad_cobro_btn">Consultar</button></a> 
                                </div>
                            </div>
                        </div>  
                    </div> 
                    <!-- Body -->
                    </div> 
                </div>
        </div> 
    </div>
</div>
@endsection