<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'designation' => $faker->word,
        'message_title' => $faker->word,
        'message_subject' => $faker->word,
        'details' => $faker->text,
        'status' => $faker->word,
        'type' => $faker->word,
        'priority' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
