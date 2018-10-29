<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emisor_id')->unsigned();
            $table->integer('receptor_id')->unsigned()->nullable();
            $table->enum('tipo',['PUBLICA','PRIVADA']);
            $table->string('descripcion');
            $table->string('horario');
            $table->string('lugar');
            $table->string('numero');
            $table->string('aceptado');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('emisor_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('receptor_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitaciones');
    }
}
