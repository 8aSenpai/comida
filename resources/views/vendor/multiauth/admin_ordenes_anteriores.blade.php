@extends('multiauth::layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ordenes Activas</div>
					@php
                		$total = 0;
                	@endphp
                <div class="card-body"> 
                	<div class="row">
	                	@foreach($ordenes as $key => $data) 

	                	<!-- Orden -->
	                	<div class="col-sm-12 col-md-4 ad_ord_cont_cont">
	                		<div class="ad_ord_cont_esp">
		                		<div class="col-12 ad_ord_tit">
		                			<b>Fecha: </b>{{ $data->fecha }}
		                		</div>
		                		<div class="col-12">
		                			Orden ID <B>#{{ $data->no_orden }}</B>
		                		</div>
		                		<div class="col-12">
		                			<b>Nombre:</b> Nombre Usuario  
		                 		</div> 
		                		<div class="col-12">
		                			<b>Telefono:</b> Telefono Usuario
		                 		</div> 
		                 		<div class="col-12">
		                 			<b>Detalles:</b>
		                 		</div> 
		                 		
		                 		@foreach($detalles as $key => $data2)  
		                 			@if($data2->no_orden == $data->no_orden)
		                 			<div class="col-12">
		                 				<li>
		                 					{{ $data2->comida_nombre }} + {{ $data2->ad_nombre }}
		                 				</li>
		                 			</div>
		                 			@php
				                		$total += $data2->comida_precio + $data2->ad_precio
				                	@endphp
		 							@endif   
		                 		@endforeach
		                 		<div class="col-12">
		 							<b>Total: {{ $total }}</b>
		 						</div> 
		 					</div>
	                	</div>
	                	@php
	                		 $total = 0;
	                	@endphp
	                	<!-- Orden -->
	                	@endforeach
	                	<div class="col-12 disp_center">
			 				<a href="{{ route('admin.home') }}"><button class="back_btn">Atras</button></a>
			 			</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 