@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Bandeja de entrada</div>

                <div class="card-body mod_card_body"> 
                     <div class="row">
                        @include('multiauth::message')
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
                            <form class="bem-form"  action="{{ route('admin.visuales.guardar') }}" enctype="multipart/form-data" class="contact" method="post">
                                {{ csrf_field() }}     
                                    @foreach($visuales as $key => $vis)
                                    <div class="form-group">
                                        <label for="role">Titulo o nombre</label>
                                        <input type="text" 
                                        name="titulo" value="{{ $vis->titulo }}" class="form-control" id="role">
                                    </div> 
                                    <div class="form-group"> 
                                        <label for="logo">Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <img class="disp_img" src="{{ asset('fotos_propiedades/'.$vis->logo) }}">
                                    </div>  
                                    <div class="form-group">
                                        <label for="role">Slogan</label>
                                        <input type="text" 
                                        name="slogan" value="{{ $vis->slogan }}" class="form-control" id="role">
                                    </div> 
                                    <div class="form-group">
                                        <label for="role">Acerca de</label>
                                        <textarea class="form-control"  rows="15" name="acerca" cols="70">{{ $vis->acerca_de }}</textarea>
                                    </div> 
                                    <div class="form-group">
                                        <label for="role">Terminos de uso</label>
                                        <textarea class="form-control"  rows="15" name="terminos" cols="30">{{ $vis->terminos_uso }}</textarea>
                                    </div> 
                                    <div class="form-group">
                                        <label for="role">Politicas de privacidad</label>
                                        <textarea class="form-control"  rows="15" name="politicas" cols="30">{{ $vis->politicas_privacidad }}</textarea>
                                    </div>  
                                    <div class="form-group">
                                        <label for="role">Facebook</label>
                                        <input type="text" 
                                        name="facebook" value="{{ $vis->facebook }}" class="form-control" id="role">
                                    </div> 
                                    <div class="form-group">
                                        <label for="role">Twitter</label>
                                        <input type="text" 
                                        name="twitter" value="{{ $vis->twitter }}" class="form-control" id="role">
                                    </div>  
                                    <div class="form-group">
                                        <label for="role">Instagram</label>
                                        <input type="text" 
                                        name="instagram" value="{{ $vis->instagram }}" class="form-control" id="role">
                                    </div> 
                                    <div class="form-group disp_center">
                                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button> 
                                    </div> 
                                    @endforeach
                            </form>   
                        </div>  
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection