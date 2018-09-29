<?php

use Illuminate\Database\Seeder;

class DeportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => 'FUTBOL',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'BASQUETBALL',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'TENIS',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'TACA-TACA',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
        ]);

    }
}
