<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
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
            return view('user.dashboard');
        } else {
            return redirect()->route('user.profiles.create');
        }
    }
}
