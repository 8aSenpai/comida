@extends('layouts.app')

@section('content')
  
<div class="container app_subcont disp_center sep">
	<!-- success -->
    @if ($message = Session::get('success')) 
    <div class="alert alert-success alert-block"> 
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong> 
    @endif
    <!-- success -->
	@foreach($productos as $key => $data) 
	<div class="row"> 
		<div class="col-sm-12 col-md-6">
			<img class="prod_img" src="{{ asset('fotos_propiedades/'.$data->img) }}">
		</div>
		<div class="col-md-6 col-sm-12" style="text-align: left;">
			<div class="col-sm-12">
				<h2>{{$data->comida_nombre}}</h2>
			</div>
			<div class="col-sm-12">
				<h5 class="prod_desc">{{$data->desc}}</h5>
			</div>
			<div class="col-sm-12">
				<h4 class="prod_prec"><b>${{$data->comida_precio}}</b></h4>
			</div>
			<div class="col-12"><p><b>Adicionales: </b></p></div>
			<div class="col-12 disp_center">
				<form action="{{ route('add_cart', $data->id_comida) }}">
					@foreach($adicionales as $key => $data2) 
			  	<div class="form-group prod_check">  
	  				<label class="prod_lab">{{$data2->ad_nombre}}  <b>Precio Total: $ {{$total= $data2->ad_precio + $data->comida_precio}} MXN </b>
					<input type="radio" value="{{$data2->id}}" name="radiadicionalo">
					<span class="checkmark"></span>
					</label> 
	  			</div>
	  				@endforeach	   
	  				<button type="submit" class="btn btn-primary">Agregar</button>
				</form>
			</div>
		</div>
	</div>
	@endforeach
</div>
</div>
@endsection
@section('scripts')

@endsection
