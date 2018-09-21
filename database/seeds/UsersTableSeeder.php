<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('carreras')->insert([
            'id' => 1,
            'nombre' => 'INFORMATICA',

            ]);

       //CREACION ADMIN
       DB::table('users')->insert([
        'carrera_id' => 1,
        'nombres' => 'ADMIN 1',
        'apellidos' => 'APELLIDO 1',
        'nick' => null,
        'tipo' => 'admin',
        'email' => 'admin1@ucm.cl',
        'password' => bcrypt('1234'),
        ]);

 
    }
}
