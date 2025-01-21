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
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $seminars = Seminar::where('seminar_date', '>=', today())->get();
        $jobs = JobDetails::latest()->where('status', 'Open')->take(6)->get();
        $scholarship = Scholarship::latest()->where('status', 1)->first();
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $countAlumni = Profile::where('student_type', 'Alumni')->count();
        $countGallery = Gallery::count();
        $countSeminar = Seminar::count();
        $countJobDetails = JobDetails::count();
        return view('frontend.index', compact(
            'seminars',
            'jobs',
            'countAlumni',
            'countGallery',
            'countSeminar',
            'countJobDetails',
            'scholarship',
            'blogs'
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
        $rollNo = $request->input('student_id');
        $regNo = $request->input('student_reg_no');
        $result = $this->getGraduateInfo($rollNo, $regNo);

        // Check if the API call was successful
        if (isset($result['error']) && $result['error'] === true) {
            // Return the error message from the API or a default error message
            return response()->json(['message' => 'Wrong information or an error occurred.'], 400);
        }

        // If the response is valid, return the response body
        return response()->json($result, 200);
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
        return view('frontend.about');
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
        $galleries = Gallery::latest();
        return view('frontend.galleries', compact('galleries'));
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
