<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Migracion de los Equipos.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modalidad_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->integer('victorias_totales')->default(0);
            $table->integer('derrotas_totales')->default(0);
            $table->integer('puntos_favor_totales')->default(0);
            $table->integer('puntos_contra_totales')->default(0);
            $table->boolean('conformado')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('modalidad_id')->references('id')->on('modalidades')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
