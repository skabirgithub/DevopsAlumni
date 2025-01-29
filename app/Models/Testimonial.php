<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Testimonial
 * @package App\Models
 * @version January 30, 2025, 3:43 am +06
 *
 * @property string $name
 * @property string $designation
 * @property string $message_title
 * @property string $message_subject
 * @property string $details
 * @property string $status
 * @property string $type
 * @property integer $priority
 */
class Testimonial extends Model
{

    public $table = 'testimonials';




    public $fillable = [
        'name',
        'designation',
        'message_title',
        'message_subject',
        'details',
        'status',
        'type',
        'image',
        'priority'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'designation' => 'string',
        'message_title' => 'string',
        'message_subject' => 'string',
        'details' => 'string',
        'status' => 'string',
        'type' => 'string',
        'priority' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        // 'image' => 'required|image|max:10000',
        'designation' => 'required|string',
        'message_title' => 'required|string',
        'message_subject' => 'required|string',
        'details' => 'required|string|max:65530'
    ];

    public static $testimonialTypes = [
        'VC' => 'VC',
        'Alumni Head' => 'Alumni Head',
        'Alumni Official' => 'Alumni Official',
        'Alumni Committee' => 'Alumni Committee',
        'Executive Comittee' => 'Executive Comittee',
        'Previous Committee' => 'Previous Committee',
        'Alumni Member' => 'Alumni Member',
        'Guest' => 'Guest',
        'Special' => 'Special',
        'Others' => 'Others',
    ];


}
