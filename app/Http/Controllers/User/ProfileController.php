<?php

namespace App\Http\Controllers\User;

use App\Helpers\CommonHelper;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserProfileCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Activity;
use App\Models\Club;
use App\Models\Profile;
use App\Models\Training;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;



class ProfileController extends Controller
{

    public function create()
    {
        $note = Auth::user()->note;
        // Decode the JSON string to an array
        $data = json_decode($note, true);
        // Access the GRADNAME field
        // return $name = $data['GRADNAME'] ?? 'Name not available';
        return view('user.profile_create',compact('data'));
    }

    public function store(UserProfileCreateRequest $request)
    {
        // return $request;
        $imageName = FileHelper::uploadImage($request, NULL, array(), 270, 360);
        $fileName = FileHelper::uploadFile($request);
        Profile::create(array_merge($request->all(), ['user_id' => Auth::id(), 'image' => $imageName, 'file' => $fileName]));
        Session::flash('success', 'Your Profile has been created.');
        return redirect()->route('user.dashboard');
    }
    public function profileView()
    {
        $user = User::where('id', Auth::id())->with('profile')->first();

        $activities = Activity::where('user_id', Auth::id())->latest()->get();
        $trainings = Training::where('user_id', Auth::id())->latest()->get();

        $note = Auth::user()->note;
        // Decode the JSON string to an array
        $data = json_decode($note, true);
        // Access the GRADNAME field
        // return $name = $data['GRADNAME'] ?? 'Name not available';
        // return $user->profile;
        $clubs = Club::where('user_id', Auth::id())->latest()->get();
        return view('user.profile', compact('user', 'activities', 'trainings', 'clubs','data'));
    }

    public function profileChange(UserUpdateRequest $request)
    {

        $user = Auth::user();
        $imageName = FileHelper::uploadImage($request, $user->profile);
        $fileName = FileHelper::uploadFile($request, $user->profile);
        $user->fill($request->all())->save();
        $user->profile->fill(array_merge($request->all(), ['image' => $imageName, 'file' => $fileName]))->save();
        return back()->with('success', 'Update Successful.');
    }

    public function changePasswordView()
    {
        return view('user.change_password');
    }

    public function changePassword(Request $request)
    {
        $message = CommonHelper::changePassword($request, "User");
        return back()->with('success', $message);
    }
}
