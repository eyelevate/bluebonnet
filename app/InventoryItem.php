<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
        'design_id',
        'inventory_id',
        'line_id',
        'subtotal',
        'taxable',
        'active'
    ];


    public static function countInventoryItems()
    {
        return InventoryItem::count();
    }
}
