<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'department',
        'faculty',
        'batch',
        'student_id',
        'phone',
        'address',
        'facebook',
        'linkedin',
        'job_type',
        'job_details',
        'student_type',
        'file',
        'image',
        'student_reg_no',
        'academic_program',
        'academic_session',
        'student_prospective',
    ];

    public static $studentProspective = [
        'Prospective' => 'Prospective',
        'Visionary' => 'Visionary',
        'Achiever' => 'Achiever',
        'Alumni Committee' => 'Alumni Committee',
        'Alumni Member' => 'Alumni Member',
        'Executive Member' => 'Executive Member',
        'Previous Committee' => 'Previous Committee',
        'Guest' => 'Guest',
        'Special' => 'Special',
        'Others' => 'Others',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function activeUser()
    {
        return $this->belongsTo(User::class,'user_id')->where('status',1);
    }
}
