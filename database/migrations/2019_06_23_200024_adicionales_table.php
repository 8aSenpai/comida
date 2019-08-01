<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_comida')->nullable(); 
            $table->foreign('id_comida')->references('id_comida')->on('productos')
            ->onDelete('cascade');
            $table->string('ad_nombre'); 
            $table->decimal('ad_precio'); 
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
