<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeminarRegistration;
use Faker\Generator as Faker;

$factory->define(SeminarRegistration::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'seminar_id' => $faker->randomDigitNotNull,
        'order_id' => $faker->randomDigitNotNull,
        'payment_amount' => $faker->word,
        'payment_date' => $faker->word,
        'status' => $faker->word,
        'transaction_id' => $faker->text,
        'note' => $faker->text,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
