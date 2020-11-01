<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'details',
        'designation',
        'member_since',
        'file',
    ];
}
