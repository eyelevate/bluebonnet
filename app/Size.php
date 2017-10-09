<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
     use SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size',
        'carat',
        'name'
    ];

    public function stoneSizes()
    {
        return $this->hasMany(StoneSize::class, 'size_id', 'id');
    }


     #public
    public function prepareTableColumns()
    {
        $columns =  [
            [
                'label'=>'Carat',
                'field'=> 'carat',
                'filterable'=> true
            
            ], [
                'label'=>'MM',
                'field'=> 'size',
                'filterable'=> true
            ], [
                'label'=>'Name',
                'field'=> 'name',
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

    public function prepareTableIndexColumns()
    {
        $columns =  [
            [
                'label'=>'Carat',
                'field'=> 'carat',
                'filterable'=> true
            
            ], [
                'label'=>'MM',
                'field'=> 'size',
                'filterable'=> true
            
            ], [
                'label'=>'Name',
                'field'=> 'name',
                'filterable'=> true
            ], [
                'label'=>'+ Price',
                'field'=> 'price',
                'filterable'=> true
            ]];

        return json_encode($columns);
    }

    public function prepareTableRows($rows)
    {
        $rows->transform(function($value, $key){
            $value['input_name'] = "stone_size[{$value->id}]";
            $last_column = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewModal-'.$value->id.'" type="button">view</button>';
            $value['action'] = $last_column;
            return $value;
        });

        return $rows;
    }



    public function prepareData($rows)
    {
        // check if exists
        if (isset($rows)) {
            foreach ($rows as $key => $value) {
                //size input name
                $rows[$key]['input_name'] = "stone_size[{$value->id}]";
            }
        }
        return $rows;
    }

    #Static
    public static function countSizes()
    {
        return Size::count();
    }
}
