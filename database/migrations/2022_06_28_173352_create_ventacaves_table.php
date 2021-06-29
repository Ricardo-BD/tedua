<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentacavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('ventacaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idventa');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientecaves')->onDelete('cascade');
            $table->integer('idestado')->unsigned();
            $table->foreign('idestado')->references('id')->on('estadoentregas')->onDelete('cascade');
            $table->integer('idtipopago')->unsigned();
            $table->foreign('idtipopago')->references('id')->on('tipopagos')->onDelete('cascade');
            $table->integer('idpago')->unsigned();
            $table->foreign('idpago')->references('id')->on('formapagos')->onDelete('cascade');
            $table->string('propina');
            $table->string('descuento');
            $table->string('efectivo');
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
        Schema::connection('tcafe')->dropIfExists('ventacaves');
    }
}
