<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipohabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipohabitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('codigo')->unique();
            $table->string('descripcion');
            $table->integer('precio_noche');
            $table->integer('precio_mes');
            $table->integer('idcategoria')->unsigned();
            $table->foreign('idcategoria')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('tipohabitacions');
    }
}
