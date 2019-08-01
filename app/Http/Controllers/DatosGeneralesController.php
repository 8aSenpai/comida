<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DatosGeneralesController extends Controller
{
    public function acerca_de(){
    	$visuales = DB::table('visuales') 
    	->get();
    	return view('acerca_de', ['visuales' => $visuales]);
    }
    public function terminos_uso(){
    	$visuales = DB::table('visuales') 
    	->get();
    	return view('terminos_uso', ['visuales' => $visuales]);
    }
    public function politicas_privacidad(){
    	$visuales = DB::table('visuales') 
    	->get();
    	return view('politicas_privacidad', ['visuales' => $visuales]);
    }
    public function contacto(){
    	return view('contacto');
    }
}
