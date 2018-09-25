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
            'nombre' => 'singles',
            'fecha' => '2018-10-29',
        ]);

        DB::table('torneos')->insert([
            'nombre' => 'singles',
            'fecha' => '2018-10-29',
        ]);

        DB::table('torneos')->insert([
            'nombre' => 'singles',
            'fecha' => '2018-11-10',
        ]);

        DB::table('torneos')->insert([
            'nombre' => 'singles',
            'fecha' => '2018-11-22',
        ]);
    }
}
