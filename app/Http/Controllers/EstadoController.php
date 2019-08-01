<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class EstadoController extends Controller
{
    public function view(){
    	$listas = DB::table('ordenes_activas')   
    	->limit(3)
    	->get(); 
    	$pendientes = DB::table('ordenes')  
		->where('estado', 'preparando')
    	->get(); 
    	return view('ordenes', ['pendientes' => $pendientes], ['listas' => $listas]);
    }
}
