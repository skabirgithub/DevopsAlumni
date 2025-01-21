<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JobDetails;
use Faker\Generator as Faker;

$factory->define(JobDetails::class, function (Faker $faker) {

    $jobTitles = [
        "Marketing Coordinator: Join Our Team and Drive Brand Success",
        "Software Engineer: Exciting Opportunity to Build Innovative Solutions",
        "Sales Representative: Help Us Expand Our Customer Base",
        "Graphic Designer: Bring Creativity to Life with Stunning Visuals",
        "Customer Support Specialist: Provide Exceptional Service and Delight Customers",
        "Data Analyst: Uncover Insights and Drive Data-Driven Decisions",
        "Project Manager: Lead Cross-Functional Teams and Deliver Successful Projects",
        "Content Writer: Craft Compelling Stories and Engaging Content",
        "Financial Analyst: Analyze Numbers and Drive Business Performance",
        "Human Resources Manager: Shape the Culture and Nurture Our Talent"
    ];

    return [
        'title' => $faker->randomElement($jobTitles),
        'details' => $faker->text,
        'image' => $faker->randomElement(['01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg', '06.jpg', '07.jpg']),
        'file' => 'job.png',
        'status' => 'Open',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
