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
        'collection_id',
        'subtotal',
        'taxable',
        'active',
        'metals',
        'stones'
    ];

    public function inventories()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'inventory_item_id', 'id');
    }


    public function collections()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }

    #public
    public function prepareTableColumns()
    {
        $columns =  [
            [
                'label'=>'Name',
                'field'=> 'name',
                'filterable'=> true
            
            ], [
                'label'=>'Description',
                'field'=> 'desc',
                'filterable'=> true
            ], [
                'label'=>'Collection',
                'field'=> 'collection_name',
                'filterable'=> true
            ], [
                'label'=>'Subtotal',
                'field'=> 'subtotal',
                'filterable'=> true
            
            ], [
                'label'=>'Taxable',
                'field'=> 'taxable_status',
                'filterable'=> true
            ], [
                'label'=>'Active',
                'field'=> 'active_status',
                'html'=> true
            ], [
                'label'=>'Created',
                'field'=> 'created_at',
                'type'=>'date',
                'inputFormat'=> 'YYYY-MM-DD HH:MM:SS',
                'outputFormat'=> 'MM/DD/YY hh:mm:ssa'
            ], [
                'label'=>'Action',
                'field'=> 'action',
                'html'=>true
            ]];

        return json_encode($columns);
    }

    public function prepareTableRows($inventories)
    {
        // check if exists
        if (isset($inventories)) {
            foreach ($inventories as $key => $value) {
                if(count($value->inventoryItems) > 0){
                    foreach ($value->inventoryItems as $iikey => $iivalue) {
                        // append last column to table here
                        $last_column = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewModal-'.$iivalue->id.'" type="button">view</button>';
                        $last_column .= '</div>';
                        $inventories[$key]['inventoryItems'][$iikey]['action'] = $last_column;


                        // active
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['active'])) {
                            $inventories[$key]['inventoryItems'][$iikey]['active_status'] = ($iivalue->active) ? '<span class="badge badge-success">Active</span>' :  '<span class="badge badge-danger">In-active</span>';
                        }  

                        // Collection Name
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['collection_id'])) {
                            $inventories[$key]['inventoryItems'][$iikey]['collection_name'] = ($iivalue->collections) ? $iivalue->collections->name :  'None';
                        } 

                        // taxable
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['taxable'])) {
                            $inventories[$key]['inventoryItems'][$iikey]['taxable_status'] = ($iivalue->taxable) ? 'Yes' :  'No';
                        } 

                        // metals
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['metals'])) {
                            $inventories[$key]['inventoryItems'][$iikey]['metals_status'] = ($iivalue->metals) ? 'Yes' :  'No';
                        } 

                        // Stone 
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['stones'])) {
                            $inventories[$key]['inventoryItems'][$iikey]['stones_status'] = ($iivalue->stones) ? 'Yes' :  'No';
                        } 

                        // images
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['images'])) {
                            $first = $iivalue->images()->where('primary',true)->first();
                            $last = $iivalue->images()->where('primary',false)->orderBy('ordered','asc')->get();
                            $ordered = $iivalue->images()->orderBy('ordered','asc')->get();
                            $inventories[$key]['inventoryItems'][$iikey]['primary_image'] = $first;
                            $inventories[$key]['inventoryItems'][$iikey]['non_primary_images'] = $last;
                            
                        } 
                    }
                }
                
            }
        }

        return $inventories;
    }


    public static function countInventoryItems()
    {
        return InventoryItem::count();
    }
}
