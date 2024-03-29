<?php

use Illuminate\Database\Seeder;

class InvitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invitaciones')->insert([
            'emisor_id' => 2,
            'receptor_id' => 4,
            'tipo' => 'privada',
            'descripcion' => 'descripcion del partido',
            'horario' => '2011-01-01',
            'lugar' => 'nose',
            'numero' => 'nose',
            'aceptado' => 'false',
        ]);

        DB::table('invitaciones')->insert([
            'emisor_id' => 3,
            'receptor_id' => 5,
            'tipo' => 'privada',
            'descripcion' => 'descripcion del partido',
            'horario' => '2011-01-01',
            'lugar' => '123123',
            'numero' => 'nose',
            'aceptado' => 'false',
        ]);
        DB::table('invitaciones')->insert([
            'emisor_id' => 4,
            'receptor_id' => 2,
            'tipo' => 'privada',
            'descripcion' => 'descripcion del partido',
            'horario' => '2011-01-01',
            'lugar' => 'nose',
            'numero' => 'nose',
            'aceptado' => 'false',
        ]);
        
    }
}
