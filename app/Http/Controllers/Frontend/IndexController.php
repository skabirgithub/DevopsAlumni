<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactFeedback;
use App\Models\Gallery;
use App\Models\JobDetails;
use App\Models\Profile;
use App\Models\Scholarship;
use App\Models\Seminar;
use App\Models\Testimonial;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $seminars = Seminar::where('seminar_date', '>=', today())->get();
        $jobs = JobDetails::latest()->where('status', 'Open')->take(3)->get();
        $scholarship = Scholarship::latest()->where('status', 1)->first();
        $blogs = Blog::where('status', 1)->where('category', 'Story')->latest()->take(3)->get();
        $countAlumni = Profile::where('student_type', 'Alumni')->count();
        $countGallery = Gallery::count();
        $countSeminar = Seminar::count();
        $countJobDetails = JobDetails::count();

        $prospectiveStudents = Profile::where('student_prospective', 'Prospective')->latest()->take(6)->get();

        $sliders = Gallery::where('category', "Slider")->latest()->take(2)->get();

        return view('frontend.index', compact(
            'seminars',
            'jobs',
            'countAlumni',
            'countGallery',
            'countSeminar',
            'countJobDetails',
            'scholarship',
            'blogs',
            'sliders',
            'prospectiveStudents',
        ));
    }

    // public function termsAndConditions()
    // {
    //     return view('frontend.terms_and_conditions');
    // }

    // public function privacyPolicy()
    // {
    //     return view('frontend.privacy_policy');
    // }


    // student verification
    public function verify_student_with_api()
    {
        return view('frontend.verification.startpage');
    }
    public function register_with_verification(Request $request)
    {
        // return $request;
        if ($request->password!= $request->password_confirmation) {
            // Flash the error message to the session
            return redirect()->back()->with('error', 'Password and Confirm Password does not match.');
        }

        $rollNo = $request->input('student_id');
        $regNo = $request->input('student_reg_no');
        $result = $this->getGraduateInfo($rollNo, $regNo);

        // Check if the API call was successful
        if (isset($result['error']) && $result['error'] === true) {
            // Flash the error message to the session
            return redirect()->back()->with('error', 'Wrong information. Please recheck your Register and Roll No.');
        }

        // If successful, you can redirect to another page or show success message
        // return $result;
        $register_user = User::create([
            'student_id' => $request->student_id,
            'student_reg_no' => $request->student_reg_no,
            'name' => $result['GRADNAME'],
            'email' => $request->email,
            'status' => 1,
            'note' => json_encode($result),
            'password' => bcrypt($request->password),
        ]);
        if ($register_user) {
            return redirect()->route('login')->with('success', 'Registration successful!');
        }
        // return redirect()->route('home')->with('success', 'Registration successful!');
    }


    function getGraduateInfo($rollNo, $regNo)
    {
        $url = 'https://passoutapi.bup.edu.bd/api/graduateInfo';
        $token = '3|PCvNydIaqejXmz0jmanoxCmFqoT8OvNxLNMMC1nf';

        try {
            $client = new Client();
            $response = $client->request('POST', $url, [
                'headers' => [
                    'Authorization' => "Bearer $token",
                ],
                'form_params' => [
                    'roll_no' => $rollNo,
                    'reg_no' => $regNo,
                ],
                'verify' => false, // Disable SSL verification
            ]);

            // If the status code is 200, return the response body as an array
            if ($response->getStatusCode() === 200) {
                return json_decode($response->getBody(), true);
            }

            // Handle non-200 responses
            return [
                'error' => true,
                'message' => 'Invalid response from the API.',
                'status_code' => $response->getStatusCode(),
            ];
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle exceptions and return an error response
            return [
                'error' => true,
                'message' => 'An error occurred while processing the request.',
                'exception' => $e->getMessage(),
            ];
        }
    }



    // student verification



    public function about()
    {
        $testimonials = Testimonial::where('status', 'Active')->orderBy('priority','desc')->latest()->take(5)->get();
        return view('frontend.about',compact('testimonials'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function feedback()
    {
        return view('frontend.feedback');
    }
    public function galleries()
    {
        $galleries = Gallery::where('category','Gallery')->latest()->get();
        $sliders = Gallery::where('category','Slider')->latest()->get();
        return view('frontend.galleries-old', compact('galleries','sliders'));
    }
    public function submitFeedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'phone' => 'nullable|string|max:191',
            'message' => 'nullable|string|max:65500',
            'feedback' => 'nullable|integer'
        ]);
        $feedback = new ContactFeedback();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->phone = $request->phone;
        $feedback->message = $request->message;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        return back()->with('success', 'Thank you for cantacting us. We will contact you soon.');
    }
}
