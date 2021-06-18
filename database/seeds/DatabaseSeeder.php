<?php

use Illuminate\Database\Seeder;
use App\Colina;
use App\country;

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
            'dato' => 'dato test',
            'pregunta_1' => 'sentencia test 1',
            'pregunta_2' => 'sentencia test 2',
            'pregunta_3' => 'sentencia test 3',
            'telefono' => '123456789',
        ]);
        factory(Colina::class, 19)->create();

        // seeders country
        factory(Country::class)->create([
            'dato' => 'dato test country',
            'pregunta_1' => 'sentencia test 1 country',
            'pregunta_2' => 'sentencia test 2 country',
            'pregunta_3' => 'sentencia test 3 country',
            'telefono' => '123456789',
        ]);
        factory(Country::class, 19)->create();
    }
}
