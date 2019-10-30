<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedInteger('usuario');
            $table->foreign('usuario')->references('id')->on('usuarios');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->string('foto');
            $table->string('lugar');
            $table->integer('presupuesto');
            $table->date('fecha');
            $table->boolean('planeado');
            $table->boolean('realizado');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
