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
        DB::table('deportes')->insert([
            'nombre' => 'FUTBOL',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'far fa-futbol',
            'imagen' => 'futbol.jpg',
        ]);

        DB::table('deportes')->insert([
            'nombre' => 'BASQUETBALL',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'fas fa-basketball-ball',
            'imagen' => 'basquetball.jpg',

        ]);

        DB::table('deportes')->insert([
            'nombre' => 'TENIS',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'fas fa-table-tennis',
            'imagen' => 'tenis.jpg',

        ]);
        DB::table('deportes')->insert([
            'nombre' => 'TACA-TACA',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'far fa-futbol',
            'imagen' => 'tacataca.jpg',
        ]);
    }
}
