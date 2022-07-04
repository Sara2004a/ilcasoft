<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecompras', function (Blueprint $table) {
            $table->integer('IdDetalleCompra', true);
            $table->integer('Cantidad');
            $table->double('CostoUnidad');
            $table->double('Total');
            $table->integer('Insumos_IdInsumo')->index('fk_DetalleCompras_Insumos1_idx');
            $table->integer('Compras_IdCompra')->index('fk_DetalleCompras_Compras1_idx');
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
        Schema::dropIfExists('detallecompras');
    }
}
