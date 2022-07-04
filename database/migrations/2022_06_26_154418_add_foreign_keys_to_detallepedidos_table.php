<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetallepedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detallepedidos', function (Blueprint $table) {
            $table->foreign(['Pedidos_IdPedido'], 'fk_DetallePedidos_Pedidos1')->references(['IdPedido'])->on('pedidos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Productos_IdProducto'], 'fk_DetallePedidos_Productos1')->references(['IdProducto'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallepedidos', function (Blueprint $table) {
            $table->dropForeign('fk_DetallePedidos_Pedidos1');
            $table->dropForeign('fk_DetallePedidos_Productos1');
        });
    }
}
