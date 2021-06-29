<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientesproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('ingredientesproductos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('id')->on('productocaves')->onDelete('cascade');
            $table->integer('idingrediente')->unsigned();
            $table->foreign('idingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
            $table->integer('cantidad');
            $table->integer('es_requerido');
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
        Schema::connection('tcafe')->dropIfExists('ingredientesproductos');
    }
}
