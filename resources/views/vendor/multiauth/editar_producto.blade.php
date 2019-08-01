@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Agregar Producto</div>

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
                            <!-- success -->
                            @if ($message = Session::get('success'))

                                <div class="alert alert-success alert-block">
 

                                <strong>{{ $message }}</strong> 
                            @endif
                            <!-- success -->
                            @foreach($productos as $key => $data)
                            <form class="bem-form"  action="{{ route('actualizar_producto', $data->id_comida) }}" enctype="multipart/form-data" class="contact" method="post">
                                @csrf
                                 
                                <div class="form-group">
                                    <label for="role">Nombre</label>
                                    <input type="text" 
                                    name="nombre" class="form-control" value="{{$data->comida_nombre}}" id="role" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Precio</label>
                                    <input type="text" 
                                    name="precio" value="{{$data->comida_precio}}" class="form-control" id="role" required>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <img class="img-thumbnail img-fluid" src="{{ asset('fotos_propiedades/'.$data->img) }}" style="">
                                        </div>
                                        <div class="col-12">
                                            <label for="from-name">Foto</label> 
                                        </div>
                                    <span class="required-input"></span>
                                    <div class="input-group"> 
                                        <input type="file" name="imagencomida" class="form-control">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Estado</label>
                                    <select class="custom-select" name="estado">
                                        <option value="{{$data->estado}}" selected="">{{$data->estado}}</option>
                                        <option value="Disponible">Disponible</option>
                                        <option value="Desactivado">Desactivado</option> 
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="role">Descripcion</label>
                                    <textarea class="form-control"  rows="15" name="desc" required="true" cols="30">{{$data->desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="role">Categoria</label>
                                    <select class="custom-select" name="categoria">
                                        <option value="{{$data->categoria}}" selected="">{{$data->categoria}}</option>
                                        <@foreach($categoria as $key => $data)
                                        <option value="{{$data->nombre}}">{{$data->nombre}}</option> 
                                        @endforeach
                                    </select>
                                </div> 
                                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                <a href="{{ route('admin.roles') }}" class="btn btn-sm btn-danger float-right">Atras</a>
                                
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