<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use DateTime;

class AdminOrdenesController extends Controller
{
    public function __construct()
    {  
        $this->middleware('role:cocina');
    }
    public function view(Request $request){
    	
    	$ordenes = DB::table('ordenes')
                ->groupBy('no_orden')  
                ->orderBy('estado', 'desc')
                ->get();

        // $detalles = DB::table('ordenes') 
        //         ->get();
        $value = $request->session()->get('key');
        $detalles = DB::table('ordenes')  
        ->join('productos', 'ordenes.id_comida', '=', 'productos.id_comida') 
        ->join('adicionales', 'ordenes.id_adicional', '=', 'adicionales.id') 
        ->select('productos.*', 'adicionales.*', 'ordenes.*')
        ->get();  
    	return view('vendor/multiauth/admin_ordenes_activas', ['ordenes' => $ordenes], ['detalles' => $detalles], ['value', $value]);
    }
    public function lista(Request $request){
        $ordid= $request->dato;
        $orden_orig = DB::table('ordenes')
                ->where('no_orden', $ordid)
                ->get();

        $estado = 'lista';
        $fecha = new DateTime();
        
        foreach($orden_orig as $key => $data){
        
            DB::insert('insert into ordenes_activas (`no_orden`, `id_comida`, `id_adicional`, `id_usuario`, `nombre_completo`, `direccion`, `telefono`, `email`, `estado`, `fecha`) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[$data->no_orden, $data->id_comida, $data->id_adicional, $data->id_usuario, $data->nombre_completo, $data->direccion, $data->telefono, $data->email, $estado, $fecha]);
        }

        DB::table('ordenes')->where('no_orden', $ordid)->delete();

        return back();
    }
    public function espera(Request $request){
        $ordid= $request->dato;
        $estado = 'preparando';

        $updateDetails = [
            'estado' => $estado, 
        ];
        DB::table('ordenes')
            ->where('no_orden', $ordid)
            ->update($updateDetails);
        return back();

    }
    public function cancelar(Request $request){
        $ordid= $request->dato;
        DB::table('ordenes')->where('id_usuario', $ordid)->delete();

        return back();
    }

    public function viewant(Request $request){
        
        $ordenes = DB::table('ordenes_activas')
                ->groupBy('no_orden')   
                ->get();

        // $detalles = DB::table('ordenes') 
        //         ->get();
        $value = $request->session()->get('key');
        $detalles = DB::table('ordenes_activas')  
        ->join('productos', 'ordenes_activas.id_comida', '=', 'productos.id_comida') 
        ->join('adicionales', 'ordenes_activas.id_adicional', '=', 'adicionales.id') 
        ->select('productos.*', 'adicionales.*', 'ordenes_activas.*')
        ->get();  
        return view('vendor/multiauth/admin_ordenes_anteriores', ['ordenes' => $ordenes], ['detalles' => $detalles], ['value', $value]);
    }
}
