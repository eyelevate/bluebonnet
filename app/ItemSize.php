<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemSize extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inventory_item_id',
        'stone_size_id',
        'price',
        'active'
    ];
    public function inventoryItems()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_item_id', 'id');
    }

    public function stoneSizes()
    {
        return $this->belongsTo(StoneSize::class, 'stone_size_id', 'id');
    }

    public function prepareData($data)
    {


        return $data;
    }

    public function prepareSelect($data)
    {
        $select = [];
    
        if (count($data)> 0) {
            $itemSizes = $data->itemSize;

            if (count($itemSizes) > 0) {

                foreach ($itemSizes as $iskey => $isvalue) {
            
                    if ($isvalue->active) {
                        $select[$isvalue->stoneSizes->stone_id] = [''=>'Select Stone Size'];
                    } 
                    
                }
                foreach ($itemSizes as $iskey => $isvalue) {
                    if ($isvalue->active) {
                        $select[$isvalue->stoneSizes->stone_id][$isvalue->id] = $isvalue->stoneSizes->sizes->name;
                    }
                    
                }
            }
        }


        return $select;
    }

    public function prepareSelectAdmin($data)
    {
        $select = [''=>'Select Stone Size'];
    
        if (count($data)> 0) {
            $itemSizes = $data->itemSize;


            if (count($itemSizes) > 0) {

                foreach ($itemSizes as $iskey => $isvalue) {
                    if ($isvalue->active) {
                        $select[$isvalue->id] = $isvalue->stoneSizes->sizes->name;
                    }
                    
                }
            }
        }
        return $select;
    }
}
