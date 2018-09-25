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
        $i = 0;

        for($user=34 ; $user<189 ; $user++)
        {
            DB::table('cuenta')->insert([
                'user_id' => $user,
                'equipo_id' => $i,
            ]);

            $i++;
        }



    }
}
