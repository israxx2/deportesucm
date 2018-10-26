<?php

use Illuminate\Database\Seeder;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;

        DB::table('equipos')->insert([
            'modalidad_id' => 2,
            'conformado' => 1,
            'nombre' => 'equipo 1',
            'user_id' => 5
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 2,
            'conformado' => 1,
            'nombre' => 'equipo 2',
            'user_id' => 2
        ]);
        DB::table('equipos')->insert([
            'modalidad_id' => 4,
            'conformado' => 1,
            'nombre' => 'equipo 3',
            'user_id' => 2
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 2,
            'conformado' => 1,
            'nombre' => 'equipo 4',
            'user_id' => 3
        ]);
        DB::table('equipos')->insert([
            'modalidad_id' => 4,
            'conformado' => 1,
            'nombre' => 'equipo 5',
            'user_id' => 3
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 10,
            'conformado' => 1,
            'nombre' => 'los bacanosos',
            'user_id' => 1
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 10,
            'conformado' => 1,
            'nombre' => 'que sucede',
            'user_id' => 2
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 10,
            'conformado' => 1,
            'nombre' => '1 + 1 soprole',
            'user_id' => 3
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 10,
            'conformado' => 1,
            'nombre' => 'calla a ese viejo',
            'user_id' => 4
        ]);

    }
}
