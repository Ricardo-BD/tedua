<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracioncavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('configuracioncaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_sistema');
            $table->string('nombre_impuesto');
            $table->string('valor_impuesto');
            $table->string('simbolo');
            $table->string('logo')->nullable();
            $table->string('fondo')->nullable();
            $table->string('footer_pdf');
            $table->string('titulo_ticket');
            $table->string('encabezado_1');
            $table->string('encabezado_2');
            $table->string('nit');
            $table->string('direccion');
            $table->string('telefono');
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
        Schema::connection('tcafe')->dropIfExists('configuracioncaves');
    }
}
