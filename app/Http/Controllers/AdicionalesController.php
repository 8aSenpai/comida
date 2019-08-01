<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Redirect; 
class AdicionalesController extends Controller
{
    public function index(){
    	$productos = DB::table('productos') 
        ->orderBy('comida_nombre')
        ->get();
        return view('vendor/multiauth/adicionales', ['productos' => $productos]);
    }
    public function ver(Request $request){
    	$item= $request->item ;
    	$adicionales = DB::table('adicionales') 
    	->where('id_comida', $item)
        ->orderBy('ad_nombre')
        ->get();
    	$productos = DB::table('productos') 
    	->where('id_comida', $item) 
        ->get();
        return view('vendor/multiauth/ver_adicionales', ['adicionales' => $adicionales], ['productos' => $productos]);
    }
    public function agregar(Request $request){
        $item2= $request->item ;
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        DB::insert('insert into adicionales ( id_comida, ad_nombre, ad_precio) values(?, ?, ?)',[$item2, $nombre, $precio]); 
        return back()->with('success','Has subido exitosamente tu publicacion.');
    }
    public function borrar(Request $request){
        $item3= $request->item;
        $null= null;
        $updateDetails = [
            'id_comida' => $null, 
        ];
        DB::table('adicionales')
            ->where('id', $item3)
            ->update($updateDetails); 
        DB::table('adicionales')->where('id', $item3)->delete();
        return back()->with('success','Has borrado exitosamente tu elemento.');
    }
}
