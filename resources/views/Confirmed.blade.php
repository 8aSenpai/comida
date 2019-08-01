@extends('layouts.app')

@section('content')
  
<div class="container app_subcont disp_center sep" style="background-color: #B2FFC6;">
	<div class="row">
		<div class="col-12">
			<h1>Gracias Por Su Pedido!!!</h1>
		</div>	
		<div class="col-12">
			<h1>Cuando su pedido esté listo podra pasar a nuestro local en "Direccion Demo #515"</h1>
		</div> 
		<div class="col-12">
			<h1>Para ver el estado de su pedido: <a href="">Consulte Aqui</a></h1>
		</div> 
		<div class="col-12">
			<a href="/"><button type="submit" class="btn btn-primary">
	            {{ __('Inicio') }}
	        </button>  </a>
		</div>	
	</div>
</div>
@endsection
