<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductosinsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productosinsumos', function (Blueprint $table) {
            $table->foreign(['UnidadesMedida_IdUnidadMedida'], 'fk_ProductosInsumos_UnidadesMedida1')->references(['IdUnidadMedida'])->on('unidadesmedida')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Productos_IdProducto'], 'fk_ProductosInsumos_Productos1')->references(['IdProducto'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Insumos_IdInsumo'], 'fk_ProductosInsumos_Insumos1')->references(['IdInsumo'])->on('insumos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productosinsumos', function (Blueprint $table) {
            $table->dropForeign('fk_ProductosInsumos_UnidadesMedida1');
            $table->dropForeign('fk_ProductosInsumos_Productos1');
            $table->dropForeign('fk_ProductosInsumos_Insumos1');
        });
    }
}
