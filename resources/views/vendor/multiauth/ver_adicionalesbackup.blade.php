@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Bandeja de entrada</div>

                <div class="card-body" style="text-align: center;"> 
                
                <div class="col-sm-12"> 
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
@endsection