@extends('layouts.app')

@section('content')
  
<div class="container ord_cont disp_center sep">
	<div class="row ord_head">  
		<div class="col-6">
			<h3>Numero</h3>
		</div>
		<div class="col-6">
			<h3>Estado</h3>
		</div> 
	</div>


	<div class="row">  
		@foreach($listas as $key => $datal) 
		<div class="col-6">
			<h3>Orden #{{ $datal->no_orden }}</h3>
		</div>
		<div class="col-6 ord_status_cont">
			<h3><span class="ord_status_g">Lista</span></h3>
		</div> 
		@endforeach
	</div> 
	<div class="row">  
		@foreach($pendientes as $key => $datap) 
		<div class="col-6">
			<h3>Orden #{{ $datap->no_orden }}</h3>
		</div>

		<div class="col-6 ord_status_cont">
			<h3><span class="ord_status_r">Pendiente</span></h3>
		</div> 
		@endforeach
	</div>
</div>
@endsection
