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
<<<<<<< HEAD
        $this->call([
            CarrerasTableSeeder::class,
            UsersTableSeeder::class,
            DeportesTableSeeder::class,
            ModalidadesTableSeeder::class,
            EquiposTableSeeder::class,
            TorneosTableSeeder::class,
        ]);
    }
=======
        $this->call(UsersTableSeeder::class);
           }
>>>>>>> ADMIN_LTE
}
