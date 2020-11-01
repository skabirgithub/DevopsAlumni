<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seminar;
use Faker\Generator as Faker;

$factory->define(Seminar::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'details' => $faker->word,
        'seminar_date' => $faker->word,
        'seminar_time' => $faker->word,
        'place' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
