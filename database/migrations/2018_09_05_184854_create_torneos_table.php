<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Migracion de los torneos.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modalidad_id')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha');
            $table->integer('min');
            $table->integer('max');
            $table->enum('tipo', ['llave', 'grupo']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('modalidad_id')->references('id')->on('modalidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneos');
    }
}
