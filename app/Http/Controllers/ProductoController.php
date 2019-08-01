<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class ProductoController extends Controller
{
    public function view(Request $request){
    	$item= $request->item ;
    	$productos = DB::table('productos') 
    	->where('id_comida', $item)
        ->orderBy('comida_nombre')
        ->get(); 
        $adicionales = DB::table('adicionales') 
    	->where('id_comida', $item) 
    	->orderBy('ad_nombre')
        ->get();
        return view('producto', ['productos' => $productos], ['adicionales' => $adicionales]); 
    }
}
