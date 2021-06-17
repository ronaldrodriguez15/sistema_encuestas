<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Colina;
use Faker\Generator as Faker;

$factory->define(Colina::class, function (Faker $faker) {
    return [
        'dato' => $faker->name,
        'pregunta_1' => $faker->sentence(3),
        'pregunta_2' => $faker->sentence(2),
        'pregunta_3' => $faker->sentence(3),
        'codigo_registro' => $faker->numberBetween(1, 15),
        'telefono' => $faker->numerify('##########'),
    ];
});
