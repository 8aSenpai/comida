<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;

class RegProductoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super');
    }
    public function view(){
        $categoria = DB::table('categoria')
        ->orderBy('nombre')
        ->get(); 
    	return view('vendor/multiauth/addprod', ['categoria' => $categoria]);
    }
    public function upload(Request $request) {
    	// Validate data  
        $estado = 'Disponible'; 
        // Required inputs
        $nombre = $request->input('nombre');
        $precio = $request->input('precio'); 
        $desc = $request->input('desc'); 
        $categoria = $request->input('categoria'); 
        // Foto
        $file1 = $request->file('imagencomida'); 
        $imageName1 = time().'1.'.$request->file('imagencomida')->extension();  
        request()->imagencomida->move(public_path('fotos_propiedades'), $imageName1);
        // Store data
        DB::insert('insert into productos ( `comida_nombre`, `comida_precio`, `estado`, `img`, `desc`, `categoria`) values(?, ?, ?, ?, ?, ?)',[$nombre, $precio, $estado, $imageName1, $desc, $categoria]);
   
        return back()->with('success','Has subido exitosamente tu publicacion.');
    }
    public function list(){ 
        $productos = DB::table('productos')->get(); 
        return view('vendor/multiauth/ad_list_prod', ['productos' => $productos]);
    }
    public function modificar(Request $request){
        $item= $request->item ;
        $productos = DB::table('productos')->where('id_comida', $item) 
        ->get();
        $categoria = DB::table('categoria')
        ->orderBy('nombre')
        ->get(); 
        return view('vendor/multiauth/editar_producto', ['productos' => $productos], ['categoria' => $categoria]);
    }
    public function actualizar(Request $request){
        $item= $request->item ;
        $nombre = $request->input('nombre');
        $precio = $request->input('precio'); 
        $estado = $request->input('estado'); 
        $desc = $request->input('desc'); 
        $categoria = $request->input('categoria'); 
        //img
        if(!empty($request->file('imagencomida'))){
 
            $file1 = $request->file('imagencomida'); 
            $imageName1 = time().'1.'.$request->file('imagencomida')->extension();  
            request()->imagencomida->move(public_path('fotos_propiedades'), $imageName1);

            DB::table('productos')
            ->where('id_comida', $item)
            ->update(['img' => $imageName1]);

        }
        $updateDetails = [
            'comida_nombre' => $nombre,
            'comida_precio' => $precio,
            'estado' => $estado,
            'desc' => $desc, 
            'categoria' => $categoria, 
        ];
        DB::table('productos')
            ->where('id_comida', $item)
            ->update($updateDetails);
        return back()->with('success','Has subido exitosamente tu publicacion.');
    }
    public function desactivados(){
        $estado = 'Desactivado';
        $productos = DB::table('productos')->where('estado', $estado) 
        ->get();
        return view('vendor/multiauth/productos_desactivados', ['productos' => $productos]);
    }
    public function activar(Request $request){

        $item= $request->item ;
        $estado = 'Disponible';
        $updateDetails = [ 
            'estado' => $estado, 
        ];
        DB::table('productos')
            ->where('id_comida', $item)
            ->update($updateDetails);
        return back()->with('success','Has subido exitosamente tu publicacion.');
    }
}
