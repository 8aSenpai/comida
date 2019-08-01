@extends('layouts.app')

@section('content')
  
<div class="container app_subcont sep">
	<div class="row">
		<div class="col-12">
			<h1>Politicas de Privacidad.</h1>
		</div>
		<div class="col-12">
			@foreach($visuales as $key => $acerca)  
			 {{ $acerca->politicas_privacidad }}
			@endforeach
		</div>
	</div>
</div>
@endsection
@section('scripts')

@endsection
