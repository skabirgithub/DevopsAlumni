<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Seminar
 * @package App\Models
 * @version November 1, 2020, 11:40 am +06
 *
 * @property string $title
 * @property string $details
 * @property string $seminar_date
 * @property time $seminar_time
 * @property string $place
 * @property string $image
 */
class Seminar extends Model
{

    public $table = 'seminars';




    public $fillable = [
        'title',
        'subtitle',
        'details',
        'amount',
        'seminar_date',
        'seminar_time',
        'seminar_close_date',
        'seminar_close_time',
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
        'title' => 'string',
        'subtitle' => 'string',
        'details' => 'string',
        'amount' => 'numeric',
        'seminar_date' => 'date',
        'seminar_close_date' => 'date',
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
        'subtitle' => 'nullable|string',
        'amount' => 'required|numeric',
        'details' => 'required|string|max:65530',
        'seminar_date' => 'required|date',
        'seminar_time' => 'required',
        'seminar_close_date' => 'nullable|date',
        'seminar_close_time' => 'nullable',
        'place' => 'required|string|max:191',
        'image' => 'required|image|max:10000'
    ];
}
