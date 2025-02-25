<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SeminarRegistration
 * @package App\Models
 * @version February 25, 2025, 1:42 pm +06
 *
 * @property integer $user_id
 * @property integer $seminar_id
 * @property integer $order_id
 * @property number $payment_amount
 * @property string $payment_date
 * @property string $status
 * @property string $transaction_id
 * @property string $note
 * @property string $image
 */
class SeminarRegistration extends Model
{

    public $table = 'seminar_registrations';
    



    public $fillable = [
        'user_id',
        'seminar_id',
        'order_id',
        'payment_amount',
        'payment_date',
        'status',
        'transaction_id',
        'note',
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
        'seminar_id' => 'integer',
        'order_id' => 'integer',
        'payment_amount' => 'double',
        'payment_date' => 'date',
        'status' => 'string',
        'transaction_id' => 'string',
        'note' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'seminar_id' => 'required',
        'order_id' => 'required',
        'payment_amount' => 'required',
        'payment_date' => 'required|date',
        'status' => 'required',
        'transaction_id' => 'required',
        'note' => 'required',
        'image' => 'required|image|max:10000'
    ];

    
}
