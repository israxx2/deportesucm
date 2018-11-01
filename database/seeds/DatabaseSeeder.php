<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            InscripcionTableSeeder::class,
            EnfrentamientosTableSeeder::class,
            CuentaTableSeeder::class,
            InvitacionesTableSeeder::class,

        ]);
    }
}
