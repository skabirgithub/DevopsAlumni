<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'phone' => $faker->word,
        'amount' => $faker->word,
        'address' => $faker->text,
        'status' => $faker->word,
        'type' => $faker->word,
        'transaction_id' => $faker->word,
        'currency' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'note' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
