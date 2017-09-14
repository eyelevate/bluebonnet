<?php

namespace App;

use App\Job;
use App\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemStone extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inventory_item_id',
        'stone_id',
        'price',
        'active'
    ];

    public function inventoryItems()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_item_id', 'id');
    }

    public function stones()
    {
        return $this->belongsTo(Stone::class, 'stone_id', 'id');
    }

    // methods
    public function checkEmail($stone_id)
    {
        $email = false;
        $stones = $this->find($stone_id);
        if ($stones) {
            $email = $stones->stones->email;
        }

        return $email;
    }
    public function checkEmailAll($cart)
    {
        $email = false;
        if (count($cart) > 0) {
            foreach ($cart as $item) {
                $stone_id = $item['stone_id'];
                $stones = $this->find($stone_id);
                if ($stones) {
                    if ($stones->stones->email) {
                        $email = true;
                        break;
                    }
                }
            }
        }

        return $email;
    }

    public function prepareSelect($data)
    {
        $select = [''=>'Select Stone Type'];
        if(isset($data)) {
            foreach ($data as $key => $value) {
                if ($value->active) {
                    $select[$value->id] = ($value->stones->desc) ? "{$value->stones->name} ({$value->stones->desc})" : $value->stones->name;
                }
                
            }
        }

        return $select;
    }

    public function stonesCompare($data)
    {
        $compare = [];
        if(isset($data)) {
            foreach ($data as $key => $value) {
                $compare[$value->id] = $value->stone_id;
                
            }
        }

        return $compare;
    }


    public function prepareDataEdit($data)
    {
        $stones = new Stone();
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                if ($value->stones) {
                    $data[$key]['email'] = ($value->stones->email) ? true : false;
                    $data[$key]['email_status'] = ($value->stones->email) ? "True" : "False";
                    $data[$key]['name'] = $value->stones->name;
                }
            }
        }


        return $data;
    }
}
