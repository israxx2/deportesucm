<?php

use Illuminate\Database\Seeder;

class CuentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

       
        DB::table('cuenta')->insert([
            'user_id' => 2,
            'equipo_id' => 2,
        ]);

        DB::table('cuenta')->insert([
            'user_id' => 2,
            'equipo_id' => 3,
        ]);
        
        DB::table('cuenta')->insert([
            'user_id' => 3,
            'equipo_id' => 4,
        ]);

        DB::table('cuenta')->insert([
            'user_id' => 3,
            'equipo_id' => 5,
        ]);
            
        



    }
}
