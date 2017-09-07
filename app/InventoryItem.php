<?php

namespace App;

use App\StoneSize;
use App\Stone;
use App\Metal;
use App\ItemStone;
use App\ItemSize;
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
        'stones',
        'sizes',
        'featured'
    ];

    public function messages()
    {
        return [
            'finger_id.required' => 'Please select a proper finger size.',
            'stone_id.required' => 'Please select a proper stone type.',
            'metal_id.required' => 'Please select a proper metal type.',
            'stone_size_id.required' => 'Please select a proper stone size.'
        ];
    }

    /** 
    * PUBLIC METHODS
    */
    public function inventories()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'inventory_item_id', 'id');
    }

    public function itemMetal()
    {
        return $this->hasMany(ItemMetal::class, 'inventory_item_id', 'id');
    }

    public function itemSize()
    {
        return $this->hasMany(ItemSize::class, 'inventory_item_id', 'id');
    }

    public function itemStone()
    {
        return $this->hasMany(ItemStone::class, 'inventory_item_id', 'id');
    }

    public function collectionItem()
    {
        return $this->belongsToMany(InventoryItem::class,'collection_item','inventory_item_id','collection_id');
    }

    #public

    public function getSubtotal($data,$quantity = 1,$metal_id = null,$stone_id= null, $stone_size_id = null)
    {
        $email = false;
        $subtotal = 0;
        if (isset($data)) {
            $subtotal = $data->subtotal;
            if(isset($stone_id)) {
                $stone = $data->itemStone()->where('stone_id',$stone_id)->first();
                // $stone = Stone::find($stone_id);
                if($stone->stones->email) {
                    $email = true;
                }
                $subtotal += $stone->price;
            }
            if(isset($stone_size_id)) {
                $stoneSize = $data->itemSize()->where('stone_size_id',$stone_size_id)->first();
                // $stoneSize = StoneSize::find($stone_size_id);
                if($stoneSize->stoneSizes->stones->email) {
                    $email = true;

                }
                $subtotal += $stoneSize->price;
            }
            if(isset($metal_id)) {
                $metal = $data->itemMetal()->where('metal_id',$metal_id)->first();
                // $metal = Metal::find($metal_id);
                $subtotal += $metal->price;
            }

        }

        if (!$email) {
            $subtotal *= $quantity;
        } else {
            $subtotal = false;
        }
        



        return $subtotal;
    }

    public function prepareDataSingle($data)
    {   
        $itemStone = new ItemStone;
        $itemSize = new ItemSize;
        if (isset($data)) {
            if (count($data->itemStone) > 0) {
                $data->itemStone = $itemStone->prepareDataEdit($data->itemStone, $data->itemSize);
            }

            if (count($data->itemMetal) > 0) {
                foreach ($data->itemMetal as $key => $value) {
                    $data->itemMetal[$key]['name'] = $value->metals->name;
                }
            }
            


        }
        


        return $data;
    }   

    public function prepareForFrontend($data)
    {
        // check if exists
        if (isset($data)) {
            foreach ($data as $key => $value) {
                if ($value->images) {
                    $first = $value->images()->where('primary',true)->first();
                    $last = $value->images()->where('primary',false)->orderBy('ordered','asc')->get();
                    $data[$key]['primary_img_src'] = asset(str_replace('public/', 'storage/', $first->featured_src));

                }
                
            }
        }

        return $data;
    }

    public function prepareForShowInventory($data)
    {
        if (isset($data)) {
            foreach ($data as $ikey => $ivalue) {
                // collection item
                $data[$ikey]['collection_set'] = false;
                if (count($ivalue->collectionItem) > 0) {
                    foreach ($ivalue->collectionItem as $collection) {
                        $pivot_collection_id = $collection->pivot->collection_id;
                        if ($pivot_collection_id == $collection_id) {
                            $data[$ikey]['collection_set'] = true;
                            break;
                        }
                    }
                    
                }
                $data[$ikey]['collectionItem'] = (count($ivalue->collectionItem) > 0) ? $ivalue->collectionItem : [];
                if (count($ivalue->images) > 0) {
                    foreach ($ivalue->images as $iikey => $iivalue) {

                        $primary_img = $ivalue->images()->where('primary',true)->first();
                        $primary_src = ($primary_img) ? $primary_img->img_src : null;
                        
                        $non_primary_imgs = $ivalue->images()->where('primary',false)->orderBy('ordered','asc')->get();
                        $data[$ikey]['primary_src'] = asset(str_replace('public/','storage/',$primary_src));
                        $data[$ikey]['non_primary_imgs'] = $non_primary_imgs;

                    }
                }
                
            }
        }
        return $data;
    }

    public function prepareForShowCollection($data)
    {
        if (isset($data)) {
            foreach ($data as $ikey => $ivalue) {
                if (count($ivalue->images) > 0) {
                    foreach ($ivalue->images as $iikey => $iivalue) {

                        $primary_img = $ivalue->images()->where('primary',true)->first();
                        $primary_src = ($primary_img) ? $primary_img->img_src : null;
                        
                        $non_primary_imgs = $ivalue->images()->where('primary',false)->orderBy('ordered','asc')->get();
                        $data[$ikey]['primary_src'] = asset(str_replace('public/','storage/',$primary_src));
                        $data[$ikey]['non_primary_imgs'] = $non_primary_imgs;

                    }
                }
                
            }
        }
        return $data;
    }


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
                'label'=>'Featured',
                'field'=> 'featured_status',
                'filterable'=> true
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

                        // Featured
                        if (isset($inventories[$key]['inventoryItems'][$iikey]['featured'])) {
                            $inventories[$key]['inventoryItems'][$iikey]['featured_status'] = ($iivalue->featured) ? 'Yes' :  'No';
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
