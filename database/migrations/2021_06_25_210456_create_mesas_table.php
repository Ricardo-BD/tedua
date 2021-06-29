<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('mesas', function (Blueprint $table) { 
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->integer('idseccion')->unsigned();
            $table->foreign('idseccion')->references('id')->on('seccions')->onDelete('cascade');
            $table->string('tiempo');
            $table->string('precio');
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
        Schema::connection('tcafe')->dropIfExists('mesas');
    }
}
