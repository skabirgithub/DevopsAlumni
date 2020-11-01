<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobDetails;
use App\Models\Profile;
use App\Models\Seminar;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function students($category)
    {
        // return Profile::all();
        $students = Profile::where('student_type', $category)->with('user')->paginate(10);
        return view('frontend.students', compact('students'));
    }

    public function seminars()
    {
        $seminars = Seminar::where('status', 1)->paginate(1);
        return view('frontend.seminars', compact('seminars'));
    }

    public function seminar($id)
    {
        $seminar = Seminar::findOrFail($id);
        return view('frontend.seminar', compact('seminar'));
    }
    public function jobs()
    {
        $jobs = JobDetails::where('status', 1)->paginate(1);
        return view('frontend.jobs', compact('jobs'));
    }

    public function job($id)
    {
        $job = JobDetails::findOrFail($id);
        return view('frontend.job', compact('job'));
    }
}
