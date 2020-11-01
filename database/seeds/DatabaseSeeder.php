<?php

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Branch;
use App\Models\CheckTwo;
use App\Models\Job;
use App\Models\JobDetails;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        // $this->call(ProgramSeeder::class);
        // $this->call(BlogSeeder::class);
        // factory(CheckTwo::class, 50)->create();
        factory(JobDetails::class, 3)->create();
        $this->call(UserSeeder::class);
        // $this->call(ContactFeedbackSeeder::class);
    }
}
