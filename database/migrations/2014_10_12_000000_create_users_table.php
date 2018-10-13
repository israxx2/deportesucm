<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Migracion de los Usuarios.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrera_id')->unsigned();
            $table->string('nombres');
            $table->string('apellidos');
            
            $table->string('nick')->nullable();
            $table->enum('tipo',['admin', 'coordinador','estudiante'])->default("estudiante");
            $table->string('email')->unique();
            $table->string('password');
            $table->string('social_name')->nullable();
            $table->string('social_id')->nullable();
            $table->string('avatar')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Migracion reversa de los usuarios.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
