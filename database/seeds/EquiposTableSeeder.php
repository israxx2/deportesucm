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

        for($modalidad=1 ; $modalidad<13 ; $modalidad++)
        {

            DB::table('equipos')->insert([
                'modalidad_id' => $modalidad,
                'conformado' => 1,
                'nombre' => 'equipo '. $i,
            ]);

            $i++;

            DB::table('equipos')->insert([
                'modalidad_id' => $modalidad,
                'conformado' => 1,
                'nombre' => 'equipo '. $i,
            ]);

            $i++;

            DB::table('equipos')->insert([
                'modalidad_id' => $modalidad,
                'conformado' => 1,
                'nombre' => 'equipo '. $i,
            ]);

            $i++;

        }
    }
}
