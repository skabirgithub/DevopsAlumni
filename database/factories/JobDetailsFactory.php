<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JobDetails;
use Faker\Generator as Faker;

$factory->define(JobDetails::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'details' => $faker->text,
        'image' => 'myimage.jpg',
        'file' => 'myimage.jpg',
        'status' => 'Open',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
