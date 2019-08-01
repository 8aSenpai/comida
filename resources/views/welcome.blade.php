@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container-fluid com_slogan">
	@foreach ($visuales as $mainlog)
    <div class="row">
     	<div class="col-md-12"> 
	     		<img class="slog_img"  src="{{ asset('fotos_propiedades/'.$mainlog->logo) }}"> 
     	</div>
     	<div class="col-12 slog_bor">
     		<div class="slog_tit_cont">
     			<h1 class="slog_tit">{{ $mainlog->titulo }}</h1> 
     		</div>  
     	</div>
     	<div class="col-12"> 
	     	<h2 class="slog_slog">{{ $mainlog->slogan }}</h2> 
     	</div> 
     </div>
     @endforeach
</div>
<div class="container"> 

	<!-- side -->
	<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  @foreach($categoria as $key => $datac)  
		  <a href="{{$datac->nombre}}">{{$datac->nombre}}</a> 
		  @endforeach
		</div>
	<!-- Use any element to open the sidenav -->
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Categorias</span>

	<!-- side -->

	<div class="row disp_center" id="main">  
	@foreach($productos as $key => $data)   
		<!-- Item -->
		<div class="col-sm-12 col-md-3">
			<div class="disp_cont">
				<a href="{{ route('producto', $data->id_comida ) }}">
				<div class="col-12">
					<img class="disp_img" src="{{ asset('fotos_propiedades/'.$data->img) }}">
				</div> 
				<div class="col-12">
					<h4 class="disp_tit">${{$data->comida_precio}}</h4>
				</div> 
				<div class="col-12">
					<h5 class="disp_prec">{{$data->comida_nombre}}</h5>
				</div> 
				</a> 
			</div>
		</div>	
		<!-- Enditem -->    
	@endforeach 
	</div>
</div>
@endsection
@section('scripts') 
<script src="{{ asset('js/sidebar.js') }}" defer></script>
@endsection