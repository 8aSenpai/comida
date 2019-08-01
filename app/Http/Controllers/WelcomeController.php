<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class WelcomeController extends Controller
{
    public function index(){
    	$categoria = DB::table('categoria')
		->orderBy('nombre')
    	->get(); 
    	$productos = DB::table('productos') 
		->where('estado', 'Disponible')
    	->get(); 
        return view('welcome', ['productos' => $productos], ['categoria' => $categoria]);
    }
}
