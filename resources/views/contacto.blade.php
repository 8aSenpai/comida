@extends('layouts.app')

@section('content')
  
<div class="container app_subcont sep">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-12">
					<h3><b>Contacto (requerido*)</b></h3>
				</div>
				<div class="col-12">
					<form class="bem-form"  action="#" class="contact" method="post">
						@csrf
						<div class="form-group">
                            <label for="role">Nombre Completo</label>
                            <input type="text" name="titulo" class="form-control" id="role">
                        </div> 
						<div class="form-group">
                            <label for="role">Correo Electronico</label>
                            <input type="text" name="titulo" class="form-control" id="role">
                        </div> 
						<div class="form-group">
                            <label for="role">Telefono</label>
                            <input type="text" name="titulo" class="form-control" id="role">
                        </div> 
                        <div class="form-group">
                            <label for="role">Comentarios</label>
                            <textarea class="form-control"  rows="15" name="politicas" cols="30"></textarea>
                        </div>
                        <div class="form-group disp_center">
                            <button type="submit" class="btn btn-primary btn-sm">Enviar</button> 
                        </div>  
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-12">
					<h3><b>Nuestra Informacion</b></h3>
				</div>
				<div class="col-12">
					<h5>Contacto</h5>
				</div>
				<div class="col-12">
					<p><b>Telefono:</b> 515352524</p>
				</div>
				<div class="col-12">
					<p><b>Correo:</b> contacto@contacto.com</p>
				</div>
				<div class="col-12">
					<h5>Direccion</h5>
				</div>
				<div class="col-12">
					<p>General cuellar #602</p>
				</div>
				<div class="col-12">
					<p>Barrio San Fransisco</p>
				</div>
				<div class="col-12">
					<p>Cocula, Guerrero</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

@endsection
