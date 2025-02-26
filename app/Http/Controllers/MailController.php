<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendTestEmail()
    {
        $details = [
            'name' => 'John Doe',
            'message' => 'This is a test email from Laravel.'
        ];

        Mail::to('abir.skoder@gmail.com')->send(new TestMail($details));

        return "Email Sent Successfully!";
    }
}
