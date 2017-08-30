<?php

namespace App;

use App\Job;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inventory_id',
        'inventory_item_id',
        'primary',
        'img_src',
        'ordered'
    ];

    public function prepareVariableInventoryItems($data)
    {
    	$variable = [];
        $job = new Job();
    	if(count($data) > 0) {
    		foreach ($data as $key => $value) {
    			$variable[$key] = [
    				'primary' => $value->primary,
    				'primary_name' => "primary_image[{$key}]",
    				'src' => asset(str_replace('public/','storage/',$value->img_src)),
    				'name' => $job->stringToDotDotDot(str_replace('public/inventory_items/', '', $value->img_src)),
                    'old'=>true,
                    'old_id'=>$value->id,
                    'old_name_old'=>"old_image[{$key}][old]",
                    'old_name_id' =>"old_image[{$key}][id]"
    			];
    		}
    	}

    	return $variable;
    }
}
