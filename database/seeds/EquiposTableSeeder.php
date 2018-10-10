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
            'user_id' => 2
        ]);

        DB::table('equipos')->insert([
            'modalidad_id' => 2,
            'conformado' => 1,
            'nombre' => 'equipo 2',
            'user_id' => 5
        ]);

        // for($modalidad=1 ; $modalidad<13 ; $modalidad++)
        // {

        //     DB::table('equipos')->insert([
        //         'modalidad_id' => $modalidad,
        //         'conformado' => 1,
        //         'nombre' => 'equipo '. $i,
        //         'user_id' => 10
        //     ]);

        //     $i++;

        //     DB::table('equipos')->insert([
        //         'modalidad_id' => $modalidad,
        //         'conformado' => 1,
        //         'nombre' => 'equipo '. $i,
        //         'user_id' => 10
        //     ]);

        //     $i++;

        //     DB::table('equipos')->insert([
        //         'modalidad_id' => $modalidad,
        //         'conformado' => 1,
        //         'nombre' => 'equipo '. $i,
        //         'user_id' => 10
        //     ]);

        //     $i++;

        // }
    }
}
