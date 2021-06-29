<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcategoria')->unsigned();
            $table->foreign('idcategoria')->references('id')->on('categoriaps')->onDelete('cascade');
            $table->string('imagen')->nullable();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('precio_entrada');
            $table->integer('precio_salida');
            $table->integer('unidad');
            $table->string('presentacion');
            $table->integer('inventario');
            $table->integer('idestado')->unsigned();
            $table->foreign('idestado')->references('id')->on('estados')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
