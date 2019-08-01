<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts/app', function( $view )
        { 
            $id_usarios = session()->getId();
            $contcarrito   = DB::table('carrito')
            ->where('id_usuario', $id_usarios)
            ->count();
            $visuales   = DB::table('visuales')->get(); 
            //pass the data to the view
            $view->with( 'contcarrito', $contcarrito );
            $view->with( 'visuales', $visuales );
            $view->with( 'id_usarios', $id_usarios );

        } );
        View::composer('welcome', function( $view )
        { 
            $visuales   = DB::table('visuales')->get(); 
            //pass the data to the view 
            $view->with( 'visuales', $visuales );

        } );
        View::composer('confirm', function( $view )
        { 
            $id_usarios = session()->getId(); 
            //pass the data to the view 
            $view->with( 'id_usarios', $id_usarios );

        } );
    }
}
