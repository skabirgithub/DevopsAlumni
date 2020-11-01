<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Scholarship;
use Faker\Generator as Faker;

$factory->define(Scholarship::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'details' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
