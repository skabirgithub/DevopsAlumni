<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\JobDetails;
use App\Models\Order;
use App\Models\Profile;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Models\User;
use App\Models\Zoom;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userProfile = Profile::where('user_id', Auth::id())->first();
        if ($userProfile) {
            $jobs = JobDetails::where('user_id',Auth::id())->count();
            $blogs = Blog::where('user_id',Auth::id())->count();
            $zooms = Zoom::where('user_id',Auth::id())->count();
            $seminars = SeminarRegistration::where('user_id',Auth::id())->where('status','paid')->count();
            $orders = Order::where('user_id',Auth::id())->whereIn('status',['Complete','Processing'])->get();
            return view('user.dashboard',compact('jobs','blogs','zooms','seminars','orders'));
        } else {
            return redirect()->route('user.profiles.create');
        }
    }
}
