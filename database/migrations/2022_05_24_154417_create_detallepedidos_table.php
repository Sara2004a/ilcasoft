<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('detallepedidos', function (Blueprint $table) {
        
            $table->integer('IdDetallePedido', true);
            $table->integer('Cantidad');
            $table->double('TotalDetallePedido');
            $table->integer('Pedidos_IdPedido')->index('fk_DetallePedidos_Pedidos1_idx');
            $table->integer('Productos_IdProducto')->index('fk_DetallePedidos_Productos1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepedidos');
    }
}
