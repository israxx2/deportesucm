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
        DB::table('modalidades')->insert([
            'deporte_id' => 1,
            'nombre' => 'FUTBOL',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
        ]);
    }
}
