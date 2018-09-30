<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => 'NINGUNA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'MEDICINA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN EDUCACION FISICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN INGLES',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA GENERAL BASICA CON MENCION',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN EDUCACION ESPECIAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN LENGUA CASTELLANA Y COMUNICACION',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN EDUCACION ESPECIAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'EDUCACION PARVULARIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA GENERAL BASICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'ENFERMERIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'KINESIOLOGIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PSICOLOGIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'NUTRICION Y DIETETICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'CONSTRUCCION CIVIL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA CIVIL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA CIVIL INDUSTRIAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA CIVIL INFORMATICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA EJECUCION EN COMPUTACION E INFORMATICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA EN CONSTRUCCION',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA CIVIL ELECTRONICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'AUDITORIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA COMERCIAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'ADMINISTRACION PUBLICA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'SOCIOLOGIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'TRABAJO SOCIAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'AGRONOMIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA EN BIOTECNOLOGIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERIA FORESTAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN RELIGION Y FILOSOFIA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN CIENCIAS',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGIA EN MATEMATICAS Y COMPUTACION',
        ]);
    }
}
