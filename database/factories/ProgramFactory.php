<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Program;
use Faker\Generator as Faker;

$factory->define(Program::class, function (Faker $faker) {

    $categories = ["Activity",  "Project",  "Notice"];
    return [
        'title' => $faker->sentence,
        'details' => '<b>Hello </b>' . $faker->paragraph,
        'category' => $faker->randomElement($categories),
        'image' => "15956542645f1bc0788a00b.jpg",
    ];
});
