<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;

class VisualesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super');
    }
    public function vista(){
        $visuales = DB::table('visuales')->get(); 
    	return view('vendor/multiauth/admin_visuales', ['visuales' => $visuales]);
    }
    public function admincontacto(){
        return view('vendor/multiauth/admin_contacto');
    }
    public function guardar(Request $request){

        $visuales = DB::table('visuales')   
        ->get();
        $id = '1';
    	$titulo = $request->input('titulo'); 
    	
        $slogan = $request->input('slogan'); 
        $acerca = $request->input('acerca'); 
        $terminos = $request->input('terminos'); 
        $politicas = $request->input('politicas'); 
        $facebook = $request->input('facebook'); 
        $twitter = $request->input('twitter'); 
        $instagram = $request->input('instagram'); 


        
        if(!empty($request->file('logo'))){
            $file1 = $request->file('logo'); 
            $logo = time().'1.'.$request->file('logo')->extension();  
            request()->logo->move(public_path('fotos_propiedades'), $logo);
            $updateDetails = [ 
                'logo' => $logo,  
            ];
            DB::table('visuales')
            ->where('id', 1)
            ->update($updateDetails);
        }
        if (count($visuales)) { 
            $updateDetails = [
                'titulo' => $titulo,  
                'slogan' => $slogan, 
                'acerca_de' => $acerca, 
                'terminos_uso' => $terminos, 
                'politicas_privacidad' => $politicas, 
                'facebook' => $facebook, 
                'twitter' => $twitter, 
                'instagram' => $instagram, 
            ];
            DB::table('visuales')
            ->where('id', 1)
            ->update($updateDetails);
            return back()->with('success','Has actualizado exitosamente tu publicacion.');
        }
        if ($visuales->isEmpty()) {
            $file1 = $request->file('logo'); 
            $logo = time().'1.'.$request->file('logo')->extension();  
            request()->logo->move(public_path('fotos_propiedades'), $logo);

            DB::insert('insert into visuales (`titulo`, `logo`, `slogan`, `acerca_de`, `terminos_uso`, `politicas_privacidad`, `facebook`, `twitter`, `instagram`) values(?, ?, ?, ?, ?, ?, ?, ?, ?)',[$titulo, $logo, $slogan, $acerca, $terminos, $politicas, $facebook, $twitter, $instagram]);
            return back()->with('success','Has actualizado exitosamente tu publicacion.');
        }
    }
}
