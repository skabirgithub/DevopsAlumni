<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Order
 * @package App\Models
 * @version February 20, 2025, 12:59 am +06
 *
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property number $amount
 * @property string $address
 * @property string $status
 * @property string $type
 * @property string $transaction_id
 * @property string $currency
 * @property integer $user_id
 * @property string $note
 */
class Order extends Model
{

    public $table = 'orders';
    



    public $fillable = [
        'name',
        'email',
        'phone',
        'amount',
        'address',
        'status',
        'type',
        'transaction_id',
        'currency',
        'user_id',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'amount' => 'double',
        'address' => 'string',
        'status' => 'string',
        'type' => 'string',
        'transaction_id' => 'string',
        'currency' => 'string',
        'user_id' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'email' => 'required|string',
        'phone' => 'required|string',
        'amount' => 'required|neumeric',
        'address' => 'required|string|max:65530'
    ];

    
}
