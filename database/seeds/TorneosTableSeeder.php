<?php

use Illuminate\Database\Seeder;

class TorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('torneos')->insert([
            'nombre' => 'TORNEO 2',
            'fecha' => '2018-10-29',
            'descripcion' => 'Torneo correspondiente al deporte, en donde se premiará al primer lugar con una medalla y un trofeo. este torneo se creo con la finalidad de fomentar la sana competencia dentro de la universidad y para insentivar el deporte.',
            'min' => 0,
            'max' => 8,
            'tipo' => 'grupo',
            'modalidad_id' => 1
        ]);

        DB::table('torneos')->insert([
            'nombre' => 'TORNEO 1',
            'fecha' => '2018-10-29',
            'descripcion' => 'Torneo correspondiente al deporte, en donde se premiará al primer lugar con una medalla y un trofeo. este torneo se creo con la finalidad de fomentar la sana competencia dentro de la universidad y para insentivar el deporte.',
            'min' => 0,
            'max' => 8,
            'tipo' => 'llave',
            'modalidad_id' => 5,
        ]);

        DB::table('torneos')->insert([
            'nombre' => 'TORNEO 3',
            'fecha' => '2018-11-10',
            'descripcion' => 'Torneo correspondiente al deporte, en donde se premiará al primer lugar con una medalla y un trofeo. este torneo se creo con la finalidad de fomentar la sana competencia dentro de la universidad y para insentivar el deporte.',
            'min' => 0,
            'max' => 8,
            'tipo' => 'llave',
            'modalidad_id' => 9,
        ]);

        DB::table('torneos')->insert([
            'nombre' => 'TORNEO 4',
            'fecha' => '2018-11-22',
            'descripcion' => 'Torneo correspondiente al deporte, en donde se premiará al primer lugar con una medalla y un trofeo. este torneo se creo con la finalidad de fomentar la sana competencia dentro de la universidad y para insentivar el deporte.',
            'min' => 0,
            'max' => 8,
            'tipo' => 'llave',
            'modalidad_id' => 10,
        ]);
    }
}
