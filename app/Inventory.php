<?php

namespace App;

use App\InventoryItem;
use App\Job;
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

    public function prepareSelect()
    {
        $select = [''=>'select inventory group'];
        $inventories =  $this->orderBy('name','asc')->get();
        if (count($inventories) > 0) {
            foreach ($inventories as $inventory) {
                $select[$inventory->id] = $inventory->name;
            }
        }
        return $select;
    }

    public function prepareForSet($collection_id)
    {
        $job = new Job();
        $itms = new InventoryItem();
        $inventories =  $this->orderBy('name','asc')->get();
        if (count($inventories) > 0) {
            foreach ($inventories as $key =>$value) {
                if(isset($inventories[$key]->desc)) {
                    $inventories[$key]['desc'] = $job->stringToDotDotDot($value->desc,40);
                }


                if(isset($inventories[$key]->inventoryItems)) {
                    foreach ($inventories[$key]->inventoryItems as $ikey => $ivalue) {
                        // collection item
                        $inventories[$key]['inventoryItems'][$ikey]['collection_set'] = false;
                        if (count($ivalue->collectionItem) > 0) {
                            foreach ($ivalue->collectionItem as $collection) {
                                $pivot_collection_id = $collection->pivot->collection_id;
                                if ($pivot_collection_id == $collection_id) {
                                    $inventories[$key]['inventoryItems'][$ikey]['collection_set'] = true;
                                    break;
                                }
                            }
                            
                        }

                        if (isset($inventories[$key]['inventoryItems'][$ikey]['desc'])) {
                            $inventories[$key]['inventoryItems'][$ikey]['desc'] = $job->stringToDotDotDot($ivalue->desc,40);
                        }
                        $inventories[$key]['inventoryItems'][$ikey]['collectionItem'] = (count($ivalue->collectionItem) > 0) ? $ivalue->collectionItem : [];
                        if (count($ivalue->images) > 0) {
                            foreach ($ivalue->images as $iikey => $iivalue) {

                                $primary_img = $ivalue->images()->where('primary',true)->first();
                                $primary_src = ($primary_img) ? $primary_img->img_src : null;
                                
                                $non_primary_imgs = $ivalue->images()->where('primary',false)->orderBy('ordered','asc')->get();
                                $inventories[$key]['inventoryItems'][$ikey]['primary_src'] = asset(str_replace('public/','storage/',$primary_src));
                                $inventories[$key]['inventoryItems'][$ikey]['non_primary_imgs'] = $non_primary_imgs;

                            }
                        }
                        
                    }
                }
            }
        }
        return $inventories;
    }


    static public function countInventories()
    {
        return Inventory::count();
    }
}
