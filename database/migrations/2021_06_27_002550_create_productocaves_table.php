<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductocavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('productocaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen')->nullable();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->integer('idseccion')->unsigned()->nullable();
            $table->foreign('idseccion')->references('id')->on('seccions')->onDelete('cascade');
            $table->integer('idcategoria')->unsigned()->nullable();
            $table->foreign('idcategoria')->references('id')->on('categoriapcaves')->onDelete('cascade');
            $table->string('descripcion')->nullable();
            $table->string('duracion')->nullable();
            $table->integer('precio_entrada');
            $table->integer('precio_salida');
            $table->integer('idunidad')->unsigned()->nullable();
            $table->foreign('idunidad')->references('id')->on('unidads')->onDelete('cascade');
            $table->integer('idpresentacion')->unsigned()->nullable();
            $table->foreign('idpresentacion')->references('id')->on('presentacions')->onDelete('cascade');
            $table->integer('minima_inventario');
            $table->integer('inventario');
            $table->integer('idestadus_cocina')->unsigned()->nullable();
            $table->foreign('idestadus_cocina')->references('id')->on('estatuscocinas')->onDelete('cascade');
            $table->integer('idestadus_servicio')->unsigned()->nullable();
            $table->foreign('idestadus_servicio')->references('id')->on('estatusservicios')->onDelete('cascade');
            $table->integer('activo');
            $table->integer('usa_inventario');
            $table->integer('usa_ingredientes');
            $table->integer('favorito');
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
        Schema::connection('tcafe')->dropIfExists('productocaves');
    }
}
