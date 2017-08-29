<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc'
    ];


    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class,'inventory_id','id');
    }


    static public function countInventories()
    {
        return Inventory::count();
    }
}
