<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB; 
use DateTime; 

class CarritoController extends Controller
{
    public function view(){
    	$id_usarios = session()->getId();
    	$carrito = DB::table('carrito') 
    	->where('id_usuario', $id_usarios)
    	->join('productos', 'carrito.id_comida', '=', 'productos.id_comida') 
    	->join('adicionales', 'carrito.id_adicional', '=', 'adicionales.id') 
    	->select('productos.*', 'adicionales.*', 'carrito.*')
        ->get();  
        if(count($carrito)){
    	   return view('carrito', ['carrito' => $carrito]);
        }
        else{
            return Redirect("/");
        }
    }

    public function agregar(Request $request){

    	$item= $request->item;
        //$id_ad = $request->input('adicional');
        if(empty($request->input('radiadicionalo'))){
            $id_ad = 1;
        }
        else{
            $id_ad = $request->input('radiadicionalo');
        }
    	$id_usarios = session()->getId();
    	// Store data
        DB::insert('insert into carrito (`id_comida`, `id_adicional`, `id_usuario`) values(?, ?, ?)',[$item, $id_ad, $id_usarios]);
        return back()->with('success','Has Agregado Este Producto Al Carrito.');


    }
    public function descartar(Request $request){
        $item= $request->item; 
        $id_usarios = session()->getId();
        // Store data 
        DB::table('carrito')->where('id', $item)->delete();
        return back();

    }
    public function confirm(Request $request){ 
         if( $request->has('acepto') ) {
              
            $id_usarios = session()->getId();
            $carrito = DB::table('carrito') 
            ->where('id_usuario', $id_usarios)
            ->join('productos', 'carrito.id_comida', '=', 'productos.id_comida') 
            ->join('adicionales', 'carrito.id_adicional', '=', 'adicionales.id') 
            ->select('productos.*', 'adicionales.*', 'carrito.*')
            ->get();  
            return view('confirm', ['carrito' => $carrito]); 
        }
        else{
            return Redirect("/carrito")->with('fail','Porfavor aceptar politicas de uso.');
        }
    }
    public function confirmed(Request $request){
        $id_usarios = session()->getId();
        $carrito = DB::table('carrito') 
            ->where('id_usuario', $id_usarios)
            ->join('productos', 'carrito.id_comida', '=', 'productos.id_comida') 
            ->join('adicionales', 'carrito.id_adicional', '=', 'adicionales.id') 
            ->select('productos.*', 'adicionales.*', 'carrito.*')
            ->get(); 
        $nombre = $request->input('nombre');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $estado = 'pendiente';
        $fecha = new DateTime();

        $no_ordenes = DB::table('ordenes')  
        ->get(); 
        if ($no_ordenes->isEmpty())
        { 
            $no_orden = 1000;
        }
        else{
            $last_no_orden = DB::table('ordenes')->get();
            foreach($last_no_orden as $key => $cont){
                $no_orden = $cont->no_orden+1;
            }
        }
        foreach($carrito as $key => $data){
            DB::insert('insert into ordenes (`no_orden`, `id_comida`, `id_adicional`, `id_usuario`, `nombre_completo`, `direccion`, `telefono`, `email`, `estado`, `fecha`) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[$no_orden, $data->id_comida, $data->id_adicional, $id_usarios, $nombre, $direccion, $telefono, $email, $estado, $fecha]);
        }

        DB::table('carrito')->where('id_usuario', $id_usarios)->delete();
    	return view('confirmed');
    }
}
