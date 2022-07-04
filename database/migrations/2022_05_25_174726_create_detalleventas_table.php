<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleventas', function (Blueprint $table) {
            $table->integer('IdDetalleVenta', true);
            $table->integer('Cantidad');
            $table->double('Total')->nullable();
            $table->integer('Ventas_IdVenta')->index('fk_DetalleVentas_Ventas1_idx');
            $table->integer('Productos_IdProducto')->index('fk_DetalleVentas_Productos1_idx');
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
        Schema::dropIfExists('detalleventas');
    }
}
