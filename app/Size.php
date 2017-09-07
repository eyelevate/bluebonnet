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
        'name'
    ];

     #public
    public function prepareTableColumns()
    {
        $columns =  [
            [
                'label'=>'Size',
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
            ]        ];

        return json_encode($columns);
    }

    public function prepareTableIndexColumns()
    {
        $columns =  [
            [
                'label'=>'Size',
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
        // check if exists
        if (isset($rows)) {
            foreach ($rows as $key => $value) {
                // append last column to table here
                $last_column = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewModal-'.$value->id.'" type="button">view</button>';
                $last_column .= '</div>';
                $rows[$key]['action'] = $last_column;

                //size input name
                $rows[$key]['input_name'] = 'stone_size[{$value->id}]';
            }
        }
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
