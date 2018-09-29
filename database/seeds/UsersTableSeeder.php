<?php

use Illuminate\Database\Seeder;

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


        //CREACION COORDINADORES
        for($i=1 ; $i<33; $i++)
        {
            DB::table('users')->insert([
                'carrera_id' => $i,
                'nombres' => 'COORDINADOR '.$i,
                'apellidos' => 'APELLIDO '.$i,
                'nick' => null,
                'tipo' => 'coordinador',
                'email' => 'coordinador'.$i.'@ucm.cl',
                'password' => bcrypt('1234'),
                ]);
        }


        //CREACION ESTUDIANTES
        $k = 1;
        for($i=2 ; $i<33; $i++)
        {
            for($j=0; $j<5; $j++)
            {

                DB::table('users')->insert([
                    'carrera_id' => $i,
                    'nombres' => 'ESTUDIANTE '.$k,
                    'apellidos' => 'APELLIDO '.$k,
                    'nick' => null,
                    'tipo' => 'coordinador',
                    'email' => 'estudiante'.$k.'@ucm.cl',
                    'password' => bcrypt('1234'),
                    ]);
                $k++;
            }
        }
    }
}
