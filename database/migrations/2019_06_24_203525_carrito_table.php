<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_comida'); 
            $table->foreign('id_comida')->references('id_comida')->on('productos');
            $table->unsignedBigInteger('id_adicional')->nullable(); 
            $table->foreign('id_adicional')->references('id')->on('adicionales');
            $table->string('id_usuario');  
        });
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
