<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $studentType = ['Executive Comittee', 'Alumni'];
    return [
        'department' => $faker->word,
        'faculty' => $faker->word,
        'batch' => $faker->word,
        'academic_program' => $faker->word,
        'academic_session' => '2014-2015',
        'student_id' => '16511027',
        'student_reg_no' => '902055054045',
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'facebook' => $faker->url,
        'linkedin' => $faker->url,
        'job_type' => $faker->word,
        'job_details' => $faker->text,
        'student_type' => $faker->randomElement($studentType),
        'file' => 'profile.jpg',
        'image' => 'profile.jpg'
    ];
});
