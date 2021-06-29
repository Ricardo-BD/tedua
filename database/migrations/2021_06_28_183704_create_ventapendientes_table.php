<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentapendientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('ventapendientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('id')->on('productocaves')->onDelete('cascade');
            $table->integer('idmesero')->unsigned();
            $table->foreign('idmesero')->references('id')->on('usercaves')->onDelete('cascade');
            $table->integer('idmesa')->unsigned();
            $table->foreign('idmesa')->references('id')->on('mesas')->onDelete('cascade');
            $table->integer('idtipoventa')->unsigned();
            $table->foreign('idtipoventa')->references('id')->on('tipoventas')->onDelete('cascade');
            $table->string('cantidad');
            $table->string('idventa');
            $table->string('pendiente');
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
        Schema::connection('tcafe')->dropIfExists('ventapendientes');
    }
}
