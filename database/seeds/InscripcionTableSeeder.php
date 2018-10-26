<?php

use Illuminate\Database\Seeder;

class InscripcionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscripcion')->insert([
            'equipo_id' => 6,
            'torneo_id' => 4,
        ]);

        DB::table('inscripcion')->insert([
            'equipo_id' => 7,
            'torneo_id' => 4,
        ]);

        DB::table('inscripcion')->insert([
            'equipo_id' => 8,
            'torneo_id' => 4,
        ]);

        DB::table('inscripcion')->insert([
            'equipo_id' => 9,
            'torneo_id' => 4,
        ]);

    }
}
