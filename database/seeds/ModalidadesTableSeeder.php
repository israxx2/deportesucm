<?php

use Illuminate\Database\Seeder;

class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<5; $i++)
        {
            DB::table('modalidades')->insert([
                'deporte_id' => $i,
                'nombre' => 'singles',
                'min' => 1,
                'max' => 1,
                'descripcion' => 'Esta es una breve descripción de la modalidad.',
            ]);

            DB::table('modalidades')->insert([
                'deporte_id' => $i,
                'nombre' => 'dobles',
                'min' => 2,
                'max' => 2,
                'descripcion' => 'Esta es una breve descripción de la modalidad.',
            ]);

            DB::table('modalidades')->insert([
                'deporte_id' => $i,
                'nombre' => 'grupos',
                'min' => 3,
                'max' => 11,
                'descripcion' => 'Esta es una breve descripción de la modalidad.',
            ]);
        }

    }
}
