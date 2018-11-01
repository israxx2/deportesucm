<?php

use Illuminate\Database\Seeder;

class EnfrentamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PRIMERA FASE
        DB::table('enfrentamientos')->insert([
            'torneo_id' => 4,
            'fase' => 1,
            'local_id' => 6,
            'visita_id' => 7,
            'ganador_id' => 6
        ]);

        DB::table('enfrentamientos')->insert([
            'torneo_id' => 4,
            'fase' => 1,
            'local_id' => 8,
            'visita_id' => 9,
            'ganador_id' => 9
        ]);

        DB::table('enfrentamientos')->insert([
            'torneo_id' => 4,
            'fase' => 1,
            'local_id' => 10,
            'visita_id' => 11,
            'ganador_id' => 11,
        ]);

        //SEGUNDA FASE

        DB::table('enfrentamientos')->insert([
            'torneo_id' => 4,
            'fase' => 2,
            'local_id' => 6,
            'visita_id' => 11,
            'ganador_id' => 11,
        ]);

        DB::table('enfrentamientos')->insert([
            'torneo_id' => 4,
            'fase' => 2,
            'local_id' => 6,
            'ganador_id' => 6,
        ]);

        //TERCERA FASE

        DB::table('enfrentamientos')->insert([
            'torneo_id' => 4,
            'fase' => 3,
            'local_id' => 6,
            'visita_id' => 11,
            'ganador_id' => 11,
        ]);
    }
}
