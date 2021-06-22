<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\country;
use Faker\Generator as Faker;

$factory->define(country::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'y-m-d', $max = 'now'),
        'pregunta_1' => $faker->sentence(3),
        'pregunta_2' => $faker->sentence(2),
        'pregunta_3' => $faker->sentence(3),
        'codigo_registro' => $faker->numberBetween(1, 15),
        'telefono' => $faker->numerify('##########'),
    ];
});
