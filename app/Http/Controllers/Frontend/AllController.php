<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\SslCommerzPaymentController;
use App\Models\JobDetails;
use App\Models\Activity;
use App\Models\Club;
use App\Models\Profile;
use App\Models\Training;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return $request->all();
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
        $seminar_registration = SeminarRegistration::where('user_id', Auth::user()->id)
            ->where('seminar_id', $id)
            ->where('status', 'paid')
            ->first();

        $registered = false;
        if ($seminar_registration) {
            $registered = true;
        }
        return view('frontend.seminar', compact('seminar','registered'));
    }
    public function seminarRegister($id, $user_id)
    {
        $user = User::findOrFail($user_id);
        $event = Seminar::findOrFail($id);

        $seminar_registration = SeminarRegistration::where('user_id', $user->id)
            ->where('seminar_id', $event->id)
            ->where('status', 'paid')
            ->first();

        if ($seminar_registration) {
            return redirect()->back()->with('error', 'You have already registered for this event');
        } else {
            // return 99;
            // Redirect to the payment route with necessary data
            $sslcommerzPaymentController = new SslCommerzPaymentController();
            $request = new Request();
            $request->merge([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'amount' => $event->amount,
                'type' => 'event',
                'type_id' => $event->id,
            ]);
            // return $request;
            return $sslcommerzPaymentController->pay_event($request);
        }
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
