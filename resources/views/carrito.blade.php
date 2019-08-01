@extends('layouts.app')

@section('content')
 
<div class="container">
	<div class="row app_subcont disp_center sep"> 
		@php
		$total = 0;
		@endphp
		@foreach($carrito as $key => $data)  
		<!-- Item -->
		<div class="col-12 cart_div">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<img class="cart_img" src="{{ asset('fotos_propiedades/'.$data->img) }}">
				</div> 
				<div class="col-md-4 col-sm-12 cart_cent"> 
					<div class="col-12">
						<h3>{{$data->comida_nombre}}</h3>
						<p><b>Adicionales:</b></p>
						<p>{{$data->ad_nombre}} ${{ $data->ad_precio }}</p>
					</div> 
					<div class="col-12">
						<h5 class="cart_prec"><b>Precio</b>: ${{$data->comida_precio + $data->ad_precio}} MXN</h5>
					</div>  
				</div>
				<div class="col-md-4 col-sm-12 cart_cent"> 
	                <a href="{{ route('descartar', $data->id ) }}"><button type="submit" class="cart_btn btn btn-primary">
	                    {{ __('Descartar') }}
	                </button></a>
				</div> 
			</div>
		</div>	
		@php
			$total = $total+$data->comida_precio+$data->ad_precio;
		@endphp
		<!-- Enditem -->  
		@endforeach
	</div>
</div>
<div class="container disp_center cart_conf">
	<form action="{{ route('confirm') }}">
	<div class="row">
		@csrf  
			<div class="col-12 checkbox_container">
				<input class="inp-cbx" id="cbx" name="acepto" type="checkbox" style="display: none;"/>
				<label class="cbx" for="cbx"><span>
				<svg width="12px" height="10px" viewbox="0 0 12 10">
				<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
				</svg></span><span>He leído y estoy de acuerdo con las <a href="#">Condiciones de Uso</a> de compra.</span></label>
			</div>
			@if ($message = Session::get('fail'))
			<div class="col-12 fail_alert">
 				<strong class="">{{ $message }}</strong>
			</div>
            @endif
		<div class="col-6">
			<h5>Total: <b>${{$total}} MXN</b></h5>
		</div>		
		<div class="col-6">
			<button type="submit" class="btn btn-primary" value="confirm">
	            {{ __('Confirmar') }}
	        </button>
		</div>	 
	</div>
	</form>
</div>
@endsection 