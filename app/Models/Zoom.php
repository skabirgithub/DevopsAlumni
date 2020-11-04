<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    protected $fillable = [
        'title',
        'details',
        'start_time',
        'meeting_id',
        'meeting_password',
        'meeting_url',
    ];
}
