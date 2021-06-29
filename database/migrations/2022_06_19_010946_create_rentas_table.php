<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->integer('idtipohabitacion')->unsigned();
            $table->foreign('idtipohabitacion')->references('id')->on('tipohabitacions')->onDelete('cascade');
            $table->integer('idhabitacion')->unsigned();
            $table->foreign('idhabitacion')->references('id')->on('habitacions')->onDelete('cascade');
            $table->integer('idprecio_noche')->unsigned();
            $table->foreign('idprecio_noche')->references('id')->on('tipohabitacions')->onDelete('cascade');
            $table->integer('idprecio_mes')->unsigned();
            $table->foreign('idprecio_mes')->references('id')->on('tipohabitacions')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('costo');
            $table->boolean('check_in');
            $table->boolean('check_out');
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
        Schema::dropIfExists('rentas');
    }
}
