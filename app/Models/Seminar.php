<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Seminar
 * @package App\Models
 * @version October 31, 2020, 3:46 pm +06
 *
 * @property string $title
 * @property string $details
 * @property string $seminal_date
 * @property time $seminal_time
 * @property string $place
 * @property string $image
 */
class Seminar extends Model
{

    public $table = 'seminars';
    



    public $fillable = [
        'user_id',
        'title',
        'details',
        'seminal_date',
        'seminal_time',
        'place',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'details' => 'string',
        'seminal_date' => 'date',
        'place' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'details' => 'required|string|max:65530',
        'seminal_date' => 'required|date',
        'seminal_time' => 'required|time',
        'place' => 'required|string|max:191',
        'image' => 'required|image|max:10000'
    ];

    
}
