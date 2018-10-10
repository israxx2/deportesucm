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

        //CREACION ESTUDIANTE
        DB::table('users')->insert([
            'carrera_id' => 1,
            'nombres' => 'ESTUDIANTE 1',
            'apellidos' => 'APELLIDO 1',
            'nick' => null,
            'tipo' => 'estudiante',
            'email' => 'e1@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        //CREACION ESTUDIANTE
        DB::table('users')->insert([
            'carrera_id' => 1,
            'nombres' => 'ESTUDIANTE 2',
            'apellidos' => 'APELLIDO 2',
            'nick' => null,
            'tipo' => 'estudiante',
            'email' => 'e2@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 1,
            'nombres' => 'ESTUDIANTE 3',
            'apellidos' => 'APELLIDO 3',
            'nick' => null,
            'tipo' => 'estudiante',
            'email' => 'e3@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 2,
            'nombres' => 'ESTUDIANTE 4',
            'apellidos' => 'APELLIDO 4',
            'nick' => null,
            'tipo' => 'estudiante',
            'email' => 'e4@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 2,
            'nombres' => 'ESTUDIANTE 5',
            'apellidos' => 'APELLIDO 5',
            'nick' => null,
            'tipo' => 'estudiante',
            'email' => 'e5@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 2,
            'nombres' => 'ESTUDIANTE 6',
            'apellidos' => 'APELLIDO 6',
            'nick' => null,
            'tipo' => 'estudiante',
            'email' => 'e6@ucm.cl',
            'password' => bcrypt('1234'),
        ]);
    }
}
