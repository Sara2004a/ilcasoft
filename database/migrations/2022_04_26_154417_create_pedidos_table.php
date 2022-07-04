<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('IdPedido', true);
            $table->dateTime ('FechaPedido');
            $table->double('TotalPedido');
            $table->boolean('Estado')->nullable();
            $table->integer('Clientes_IdCliente')->index('fk_Pedidos_Clientes1_idx');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
