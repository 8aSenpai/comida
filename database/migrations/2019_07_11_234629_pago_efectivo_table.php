<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagoEfectivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_efectivo', function (Blueprint $table) {
            $table->bigIncrements('id_efectivo');
            $table->bigInteger('no_orden')->nullable();  
            $table->decimal('monto'); 
            $table->dateTime('fecha'); 
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
