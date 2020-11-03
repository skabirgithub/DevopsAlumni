<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {

    $categories = ["Slider", "Gallery"];
    return [
        'category' => $faker->randomElement($categories),
        'image' => "myimage.jpg",
    ];
});
