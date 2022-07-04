<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetallecomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detallecompras', function (Blueprint $table) {
            $table->foreign(['Insumos_IdInsumo'], 'fk_DetalleCompras_Insumos1')->references(['IdInsumo'])->on('insumos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Compras_IdCompra'], 'fk_DetalleCompras_Compras1')->references(['IdCompra'])->on('compras')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallecompras', function (Blueprint $table) {
            $table->dropForeign('fk_DetalleCompras_Insumos1');
            $table->dropForeign('fk_DetalleCompras_Compras1');
        });
    }
}
