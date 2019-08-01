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

                	@if($data->estado == 'preparando')
                	<!-- Orden -->
                	<div class="col-sm-12 col-md-4 ad_ord_cont_cont">
                		<div class="ad_ord_cont_pend">
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
	 							<b>Total: ${{ $total }}MXN</b>
	 						</div>

	 						<div class="row disp_center"> 
		 						<div class="col-4">
		 							<a href="{{ route('ad_orden_lista', $data->no_orden) }}"><button class="ad_ord_btn">Listo</button></a>
		 						</div>
		 						<div class="col-4">
		 							<a href="{{ route('ad_orden_espera', $data->no_orden) }}"><button class="ad_ord_btn">Procesando</button></a>
		 						</div>
		 						<div class="col-4">
		 							<a href="{{ route('ad_orden_cancel', $data->id_usuario) }}" onclick="myFunction()"><button id="ord_cancel" class="ad_ord_btn" >Cancelar</button></a>
	 							</div>
	 						</div>

	 					</div>
                	</div>
                	@php
                		 $total = 0;
                	@endphp
                	<!-- Orden -->
                	@endif
                	@if($data->estado == 'pendiente')
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
	 							<b>Total: ${{ $total }} MXN</b>
	 						</div>

	 						<div class="row disp_center"> 
		 						<div class="col-4 mt-auto">
		 							<a href="{{ route('ad_orden_lista', $data->no_orden) }}"><button class="ad_ord_btn">Listo</button></a>
		 						</div>
		 						<div class="col-4 mt-auto">
		 							<a href="{{ route('ad_orden_espera', $data->no_orden) }}"><button class="ad_ord_btn">Procesando</button></a>
		 						</div>
		 						<div class="col-4 mt-auto">
		 							<a href="{{ route('ad_orden_cancel', $data->id_usuario) }}" onclick="myFunction()"><button id="ord_cancel" class="ad_ord_btn" >Cancelar</button></a>
	 							</div>
	 						</div>
	 					</div>
                	</div>
                	@php
                		 $total = 0;
                	@endphp
                	<!-- Orden -->
                	@endif
                	@endforeach
                	</div>
                	<div class="row disp_center"> 
	 					<div class="col-12">
		 					<a href="{{ route('admin.home') }}"><button class="back_btn">Atras</button></a>
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
function myFunction() {
  if (confirm('Si cancelas la orden, no la podras recuperar')) {
      var url = $(this).attr('href');
      $('#content').load(url);
    }
  else{
      event.preventDefault();
  }
}
</script>
@endsection