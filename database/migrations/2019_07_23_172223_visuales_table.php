<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisualesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visuales', function (Blueprint $table) {
            $id=1;
            $table->bigIncrements('id')->autoIncrement(); 

            $table->string('titulo');
            $table->string('logo');
            $table->string('slogan');
            $table->longText('acerca_de');
            $table->longText('terminos_uso');
            $table->longText('politicas_privacidad');  
            $table->string('facebook');
            $table->string('twitter');  
            $table->string('instagram'); 

            /*
            
            $table->string('titulo')->default('titulo');
            $table->string('logo')->default('none');
            $table->string('slogan')->default('slogan');
            $table->longText('acerca_de')->default('acerca de');
            $table->longText('terminos_uso')->default('terminos');
            $table->longText('politicas_privacidad')->default('politicas');  
            $table->string('facebook')->default('facebook');
            $table->string('twitter')->default('twitter');  
            $table->string('instagram')->default('instagram'); 
            */
        });  
        $a = 1;
        $b = 'titulo';
        $c = 'none';
        $d = 'slogan';
        $e = 'acerca de';
        $f = 'terminos';
        $g = 'politicas';
        $h = 'facebook';
        $i = 'twitter';
        $j = 'instragram';
        DB::insert('insert into visuales (`id`, `titulo`, `logo`, `slogan`, `acerca_de`, `terminos_uso`, `politicas_privacidad`, `facebook`, `twitter`, `instagram`) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[$a, $b, $c, $d, $e, $f, $g, $h, $i, $j]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
