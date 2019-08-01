<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB; 

class AdminCobrosController extends Controller
{
    public function __construct()
    {  
        $this->middleware('role:cocina');
    }
    public function  view(){
    	return view('vendor/multiauth/admin_cobros');
    }
    public function viewefectivo(){
    	return view('vendor/multiauth/admin_pago_efectivo');
    }
    public function viewtarjeta(){
        return view('vendor/multiauth/admin_pago_tarjeta');
    }
    public function viewconsulta(){
        return view('vendor/multiauth/admin_pago_consulta');
    }
    public function viewconsultaefectivo(){
        $pago_efectivo = DB::table('pago_efectivo')  
        ->get();
        return view('vendor/multiauth/admin_pago_consulta_efectivo', ['pago_efectivo' => $pago_efectivo]); 
    }
    public function viewconsultatarjeta(){
        $pago_tarjeta = DB::table('pago_tarjeta')  
        ->get();
        return view('vendor/multiauth/admin_pago_consulta_tarjeta', ['pago_tarjeta' => $pago_tarjeta]); 
    }
    public function viewconsultabusqueda(Request $request){
        $no_orden = $request->input('noorden');

        $pago_tarjeta = DB::table('pago_tarjeta')  
        ->where('no_orden', $no_orden)
        ->get();
        $pago_efectivo = DB::table('pago_efectivo')  
        ->where('no_orden', $no_orden)
        ->get();
        if(count($pago_tarjeta)){
            return view('vendor/multiauth/admin_pago_consulta_tarjeta', ['pago_tarjeta' => $pago_tarjeta]); 
        }
        if(count($pago_efectivo)){
            return view('vendor/multiauth/admin_pago_consulta_efectivo', ['pago_efectivo' => $pago_efectivo]); 
        }
        if($pago_tarjeta->isEmpty() && $pago_efectivo->isEmpty()){
            return back()->with('success','No se encontraron resultados.');
        }


        
    }
    public function pagoefectivo(Request $request){
        $fecha = new DateTime();
        $no_orden = $request->input('noorden');
        $monto = $request->input('monto');
        DB::insert('insert into pago_efectivo (`no_orden`, `monto`, `fecha`) values(?, ?, ?)',[$no_orden, $monto, $fecha]);
        return back()->with('success','Tu pago ha sido registrado.');
    }
    public function pagotarjeta(Request $request){
        $fecha = new DateTime();
        $no_orden = $request->input('noorden');
        $no_folio = $request->input('nofolio');
        $ine = $request->input('ine');
        $tipo = $request->input('radiotipo');
        $monto = $request->input('monto');
        DB::insert('insert into pago_tarjeta (`no_orden`, `no_folio`, `ine`, `tipo`, `monto`, `fecha`) values(?, ?, ?, ?, ?, ?)',[$no_orden, $no_folio, $ine, $tipo, $monto, $fecha]);
        return back()->with('success','Tu pago ha sido registrado.');
    }
}
