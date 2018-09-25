<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarrerasTableSeeder::class,
            UsersTableSeeder::class,
            DeportesTableSeeder::class,
            ModalidadesTableSeeder::class,
            EquiposTableSeeder::class,
            TorneosTableSeeder::class,
        ]);
    }
}
