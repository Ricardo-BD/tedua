<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsercavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tcafe')->create('usercaves', function (Blueprint $table) {
            $table->increments('id');    
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('nombre_completo');
            $table->integer('idrole')->unsigned();
            $table->foreign('idrole')->references('id')->on('rolescaves')->onDelete('cascade');
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
        Schema::connection('tcafe')->dropIfExists('usercaves');
    }
}
