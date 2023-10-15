<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id')->nullable();
            $table->foreign('venta_id')->references('id')->on('ventas');
                                                             
            $table->float('precio', 8, 2);
            $table->string('nombre');
            $table->string('direccion'); 
            $table->string('detalle'); 
            $table->unsignedBigInteger('id_personal')->nullable();
            $table->foreign('id_personal')->references('id')->on('personals');

            // es nesesario saber quien confirmo la entrega
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            
            $table->unsignedBigInteger('cliente_id')->nullable();
           
            $table->string('estado');     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
}
