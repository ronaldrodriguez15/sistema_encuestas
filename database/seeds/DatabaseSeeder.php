<?php

use Illuminate\Database\Seeder;
use App\Colina;
use App\country;
use App\Rol;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // seeders colina
        factory(Colina::class)->create([
            'date' => '2021-06-01',
            'pregunta_1' => 'sentencia test 1 colina',
            'pregunta_2' => 'sentencia test 2 colina',
            'pregunta_3' => 'sentencia test 3 colina',
            'telefono' => '123456789',
        ]);
        factory(Colina::class, 19)->create();

        // seeders country
        factory(Country::class)->create([
            'date' => '2021-06-01',
            'pregunta_1' => 'sentencia test 1 country',
            'pregunta_2' => 'sentencia test 2 country',
            'pregunta_3' => 'sentencia test 3 country',
            'telefono' => '123456789',
        ]);
        factory(Country::class, 19)->create();


    }
}
