<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProduccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producciones', function (Blueprint $table) {
            $table->foreign(['Productos_IdProducto'], 'fk_Producciones_Productos1')->references(['IdProducto'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producciones', function (Blueprint $table) {
            $table->dropForeign('fk_Producciones_Productos1');
        });
    }
}
