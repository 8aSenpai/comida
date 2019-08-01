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
                            <div class="ad_men_back">
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
                            <div class="disp_center"> 
                                  <form class="bem-form"  action="{{ route('admin.cobro.consulta.busqueda') }}" enctype="multipart/form-data" class="contact" method="post">
                                 @csrf
                                    <div class="form-group">
                                        <label for="role">Numero de orden</label>
                                        <input type="text" name="noorden" class="form-control" id="role" required="">
                                    </div> 
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </form>
                            </div>
                            <div class="row disp_center"> 
                                <div class="col-12">
                                    <h3>todos los pagos realizados</sub></h3>
                                </div> 
                            </div>
                            <div class="row disp_center ad_cobro_head">
                                <div class="col-6 ad_cobro_men">
                                    <a href="{{ route('admin.cobro.consulta.efectivo') }}" class="ad_cobro_hrf"><button class="ad_cobro_btn">Efectivo</button></a> 
                                </div>
                                <div class="col-6 ad_cobro_men">
                                    <a href="{{ route('admin.cobro.consulta.tarjeta') }}" class="ad_cobro_hrf"><button class="ad_cobro_btn">Tarjeta</button></a> 
                                </div> 
                            </div> 
                            @if ($message = Session::get('success'))

                                <div class="col-12 disp_center">
                                    <b>{{ $message }}</b>
                                </div>

                            @endif
                        </div>  
                    </div>     
                    <!-- New -->
                    
                    <!-- Body -->
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection