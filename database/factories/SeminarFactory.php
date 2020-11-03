<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seminar;
use Faker\Generator as Faker;

$factory->define(Seminar::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'details' => $faker->paragraph,
        'seminar_date' => $faker->date,
        'seminar_time' => $faker->time,
        'place' => $faker->word,
        'image' => 'myimage.jpg',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
