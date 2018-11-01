<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfrentamientosTable extends Migration
{
    /**
     * Migracion de tabla intermedia: equipo_torneo.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfrentamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fase');
            $table->integer('torneo_id')->unsigned();
            $table->integer('local_id')->unsigned();
            $table->integer('visita_id')->unsigned()->nullable();
            $table->integer('ganador_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade');
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
        Schema::dropIfExists('enfrentamientos');
    }
}
