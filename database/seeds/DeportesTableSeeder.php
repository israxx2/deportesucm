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
            'imagen' => 'http://diario16.com/wp-content/uploads/2017/05/f%C3%BAtbol.jpg',
        ]);

        DB::table('deportes')->insert([
            'nombre' => 'BASQUETBALL',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'fas fa-basketball-ball',
            'imagen' => 'https://e00-marca.uecdn.es/p/110/sp/11000/thumbnail/entry_id/0_7qmnn29u/version/100001/width/630/height/390',
       
        ]);

        DB::table('deportes')->insert([
            'nombre' => 'TENIS',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'fas fa-table-tennis',
            'imagen' => 'https://atletasla.com/wp-content/uploads/2017/07/Tecnologia-en-el-Deporte-3.jpg',
       
        ]);
        DB::table('deportes')->insert([
            'nombre' => 'TACA-TACA',
            'descripcion' => 'Esta es una breve descripción del deporte, aca se podrán especificar detalles del deporte como tal vez: reglas, modo de juego, etc...',
            'icon' => 'far fa-futbol',
            'imagen' => 'http://noticias.universia.cl/net/images/tiempo-libre/c/ca/cam/campeonato-nacional-de-taca-taca-limon-soda-universia-2015.jpg
            ',
        ]);
    }
}
