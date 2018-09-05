<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Migracion de los partidos.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local_id')->unsigned();
            $table->integer('visita_id')->unsigned();
            $table->integer('puntos_local');
            $table->integer('puntos_visita');
            $table->integer('ganador_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('local_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('visita_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('ganador_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
