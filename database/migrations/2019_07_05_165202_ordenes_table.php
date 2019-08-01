<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->bigIncrements('id_ordenes');
            $table->unsignedBigInteger('id_comida'); 
            $table->foreign('id_comida')->references('id_comida')->on('productos');
            $table->unsignedBigInteger('id_adicional')->nullable(); 
            $table->foreign('id_adicional')->references('id')->on('adicionales');
            $table->bigInteger('no_orden');  
            $table->string('id_usuario');  
            $table->string('nombre_completo');  
            $table->string('direccion');  
            $table->string('telefono');  
            $table->string('email');  
            $table->string('estado');  
            $table->string('fecha');  
        });
        DB::statement('ALTER TABLE ordenes AUTO_INCREMENT = 1234;');
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
