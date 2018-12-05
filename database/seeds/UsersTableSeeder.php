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
            'ciudad' =>'Talca',
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
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'estudiante',
            'avatar' => 'default.png',
            'email' => 'e1@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

         //CREACION mod
         DB::table('users')->insert([
            'carrera_id' => 1,
            'nombres' => 'cord1 1',
            'apellidos' => 'APELLIDO 1',
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'coordinador',
            'avatar' => 'default.png',
            'email' => 'mod1@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        //CREACION ESTUDIANTE
        DB::table('users')->insert([
            'carrera_id' => 1,
            'nombres' => 'ESTUDIANTE 2',
            'apellidos' => 'APELLIDO 2',
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'estudiante',
            'avatar' => 'default.png',
            'email' => 'e2@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 1,
            'nombres' => 'ESTUDIANTE 3',
            'apellidos' => 'APELLIDO 3',
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'estudiante',
            'avatar' => 'default.png',
            'email' => 'e3@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 2,
            'nombres' => 'ESTUDIANTE 4',
            'apellidos' => 'APELLIDO 4',
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'estudiante',
            'avatar' => 'default.png',
            'email' => 'e4@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 2,
            'nombres' => 'ESTUDIANTE 5',
            'apellidos' => 'APELLIDO 5',
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'estudiante',
            'avatar' => 'default.png',
            'email' => 'e5@ucm.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'carrera_id' => 2,
            'nombres' => 'ESTUDIANTE 6',
            'apellidos' => 'APELLIDO 6',
            'ciudad' =>'Talca',
            'nick' => null,
            'tipo' => 'estudiante',
            'avatar' => 'default.png',
            'email' => 'e6@ucm.cl',
            'password' => bcrypt('1234'),
        ]);
    }
}
