@extends('layouts.app')

@section('content')
  
<div class="container app_subcont disp_center sep">
	<div class="row"> 
		<div class="col-12"> 
			<form action="{{ route('confirmed', $id_usarios) }}">
				@csrf
		  	<div class="form-group"> 
			    <input type="text" required="true" placeholder="Nombre Completo" name="nombre" class="cart_btn form-control">
		  	</div>
		  	<div class="form-group"> 
			    <input type="text" required="true" placeholder="Direccion" name="direccion" class="cart_btn form-control">
		  	</div>  
		  	<div class="form-group"> 
			    <input type="text" required="true" id="onlynumbers" placeholder="Telefono" name="telefono" class="cart_btn form-control">
		  	</div>  
		  	<div class="form-group"> 
			    <input type="text" required="true" placeholder="Correo Electronico" name="email" class="cart_btn form-control">
		  	</div>   
			<div class="col-12">
				@php
				$total2 = 0; 
				foreach($carrito as $key => $data){
				$total2 = $total2+$data->comida_precio+$data->ad_precio;
				}
				  
				@endphp  
				<h5>Su Sera De Total: <b>${{$total2}} MXN</b></h5>
			</div>	
			<div class="col-12">
				<h5>Se le enviara su ticket a su numero telefonico por medio de whatsapp o correo electronico</h5>
			</div>  
		  	<button type="submit" class="btn btn-primary">Confirmar</button>
			</form>
		</div>
	</div> 
</div>
@endsection
@section('scripts')
<script type="text/javascript"> 
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}
setInputFilter(document.getElementById("onlynumbers"), function(value) {
  return /^\d*\.?\d*$/.test(value);
});
</script>
@endsection