<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemMetal extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inventory_item_id',
        'metal_id',
        'price',
        'active'
    ];

    public function inventoryItems()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_item_id', 'id');
    }

    public function metals()
    {
        return $this->belongsTo(Metal::class, 'metal_id', 'id');
    }

    public function prepareSelect($data)
    {
        $select = [''=>'Select Metal Type'];
        if (count($data)>0) {
            foreach ($data as $key => $value) {
                if ($value->active) {
                    $select[$value->id] = $value->metals->name;
                }
                
            }
        }

        return $select;
    }
}
