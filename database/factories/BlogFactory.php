<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'details' => $faker->paragraph,
        'image' => "15956534045f1bbd1ca2f7b.jpg",
        'tags' => $faker->word,
        'posted_by' => $faker->name,
    ];
});
