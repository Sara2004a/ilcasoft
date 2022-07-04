<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosinsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productosinsumos', function (Blueprint $table) {
            $table->integer('IdProductosInsumos', true);
            $table->integer('Cantidad');
            $table->integer('Productos_IdProducto')->index('fk_ProductosInsumos_Productos1_idx');
            $table->integer('UnidadesMedida_IdUnidadMedida')->index('fk_ProductosInsumos_UnidadesMedida1_idx');
            $table->integer('Insumos_IdInsumo')->index('fk_ProductosInsumos_Insumos1_idx');
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
        Schema::dropIfExists('productosinsumos');
    }
}
