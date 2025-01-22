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
