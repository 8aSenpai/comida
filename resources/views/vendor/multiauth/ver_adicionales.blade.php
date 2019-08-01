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
                            @foreach($productos as $key => $data)  
                          
	                        <div class="row">
	                            <div class="col">
	                                <h3>Lista de Adicionales Para {{$data->comida_nombre}}</h3>
	                            </div>
	                        </div>
	                        <!-- adicionales -->
	                        @foreach($adicionales as $key => $data2) 
	                        <div class="row" style="text-align: center; margin-bottom: 20px;"> 
	                            <div class="col-md-6 col-sm-12">
	                                <div class="col-md-12 col-sm-12"> 
	                                    <input type="text" name="nombre" class="form-control" value="{{$data2->ad_nombre}}" id="role" style="font-weight: bold;"> 
	                                </div> 
	                            </div>
	                            <div class="col-md-6 col-sm-12"> 
	                                <a href="{{route('deladicional', $data2->id)}}"><button type="submit" name="actualizar" class="btn btn-primary btn-sm">Borrar</button></a>
	                            </div>   
	                        </div>
	                         
	                        
	                        @endforeach

	                        <!-- Nuevo -->
	                        <form class="bem-form"  action="{{ route('addadicional', $data->id_comida)}}" class="contact" method="post"> 
	                             {{ csrf_field() }} 
	                        <div class="row" style="margin-top: 100px;"> 
	                            <div class="col-md-4 col-sm-12">
	                                <p><b>Agregar Nueva</b></p>
	                            </div>  
	                            <div class="col-md-8 col-sm-12">
	                                <div class="col-md-12 col-sm-12"> 
	                                    <input type="text" name="nombre" placeholder="Nombre" class="form-control" id="role" required> 
	                                </div>  
	                                <div class="col-md-4 col-sm-12"> 
	                                    <input type="text" placeholder="Precio" name="precio" class="form-control" id="role" required> 
	                                </div>  
	                            </div> 
	                            <div class="col-md-12 col-sm-12">
	                                <button type="submit" name="guardar" class="btn btn-primary btn-sm">Guardar</button>
	                            </div>  
	                        </div> 
	                        </form> 
	                        @endforeach   
                        </div>  
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection