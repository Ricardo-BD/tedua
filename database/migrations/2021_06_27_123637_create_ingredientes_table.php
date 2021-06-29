<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->string('precio_entrada');
            $table->string('precio_salida');
            $table->integer('idcategoria')->unsigned()->nullable();
            $table->foreign('idcategoria')->references('id')->on('categoriaicaves')->onDelete('cascade');
            $table->string('minima_inventario');
            $table->string('activo');
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
        Schema::connection('tcafe')->dropIfExists('ingredientes');
    }
}
