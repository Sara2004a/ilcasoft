<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalleventas', function (Blueprint $table) {
            $table->foreign(['Ventas_IdVenta'], 'fk_DetalleVentas_Ventas1')->references(['IdVenta'])->on('ventas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Productos_IdProducto'], 'fk_DetalleVentas_Productos1')->references(['IdProducto'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalleventas', function (Blueprint $table) {
            $table->dropForeign('fk_DetalleVentas_Ventas1');
            $table->dropForeign('fk_DetalleVentas_Productos1');
        });
    }
}
