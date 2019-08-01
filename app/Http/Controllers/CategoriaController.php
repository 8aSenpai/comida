<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class CategoriaController extends Controller
{
    public function index(){
    	$categoria = DB::table('categoria') 
        ->orderBy('nombre')
        ->get();
        return view('vendor/multiauth/ver_categorias', ['categoria' => $categoria]);
    }
    public function actualizar(Request $request){

        $item= $request->item ;
        if (isset($_POST['actualizar'])) {
	        $nombre = $request->input('nombre');  
	        $updateDetails = [
	            'nombre' => $nombre, 
	        ];
	        DB::table('categoria')
	            ->where('id', $item)
	            ->update($updateDetails);
	        return back()->with('success','Has subido exitosamente tu publicacion.');
	    }
        if (isset($_POST['borrar'])) { 
	        DB::table('categoria')->where('id', $item)->delete();
	        return back()->with('success','Borrado');
	    }
    }
    public function agregar(Request $request){
    	$nombre = $request->input('nombre');
    	DB::insert('insert into categoria ( `nombre`) values(?)',[$nombre]);
   
        return back()->with('success','Has subido exitosamente tu publicacion.');
    }
}
