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
        'employee_id',
        'vendor_id',
        'fob',
        'po_number',
        'requisitioner',
        'quantity',
        'subtotal',
        'tax',
        'total',
        'tendered',
        'payment_type',
        'last_four',
        'transaction_id',
        'street',
        'suite',
        'city',
        'state',
        'country',
        'zipcode',
        'comment',
        'terms',
        'status'

    ];
}
