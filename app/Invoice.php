<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'quantity', 
        'subtotal',
        'tax',
        'total',
        'tendered',
        'payment_type',
        'last_four',
        'transaction_id',
        'status'
    ];
}

