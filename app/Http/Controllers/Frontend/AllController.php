<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobDetails;
use App\Models\Activity;
use App\Models\Club;
use App\Models\Profile;
use App\Models\Training;
use App\Models\Seminar;
use App\Models\User;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function students($category)
    {
        // return Profile::all();
        $academicProgram = Profile::get()->unique('academic_program')->pluck('academic_program');
        $students = Profile::where('student_type', $category)->with('activeUser')->paginate(9);
        return view('frontend.students', compact('students', 'category', 'academicProgram'));
    }
    public function studentSearch(Request $request)
    {
        $category = $request->category;
        $query = Profile::where('student_type', $category)->with('activeUser');

        if ($request->has('academic_program') && $request->academic_program != 'Academic Program') {
            $query->where('academic_program', $request->academic_program);
        }

        if ($request->has('name') && !empty($request->name)) {
            $query->whereHas('activeUser', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->name . '%');
            });
        }

        $students = $query->paginate(9);

        $academicProgram = Profile::get()->unique('academic_program')->pluck('academic_program');

        return view('frontend.students', compact('students', 'category', 'academicProgram'));
    }


    public function studentProfile($userId)
    {
        $user = User::where('id', $userId)->where('status', 1)->with('profile')->first();
        if ($user) {
            $activities = Activity::where('user_id', $user->id)->latest()->get();
            $trainings = Training::where('user_id', $user->id)->latest()->get();

            $clubs = Club::where('user_id', $user->id)->latest()->get();
            return view('frontend.student_profile', compact('user', 'activities', 'trainings', 'clubs'));
        } else {
            abort(404);
        }
    }

    public function seminars()
    {
        $seminars = Seminar::orderBy('seminar_date', 'desc')->paginate(9);
        return view('frontend.seminars', compact('seminars'));
    }

    public function seminar($id)
    {
        $seminar = Seminar::findOrFail($id);
        return view('frontend.seminar', compact('seminar'));
    }
    public function jobs()
    {
        $jobs = JobDetails::latest()->where('status', 'Open')->paginate(9);
        return view('frontend.jobs', compact('jobs'));
    }

    public function job($id)
    {
        $job = JobDetails::findOrFail($id);
        return view('frontend.job', compact('job'));
    }
}
