<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoneSize extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price'
     ];

    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function stones()
    {
        return $this->belongsTo(Stone::class, 'stone_id', 'id');
    }

    public function itemSizes()
    {
        return $this->hasMany(ItemSize::class, 'stone_size_id', 'id');   
    }

    public function prepareSelect($data)
    {
        $select = [];
    
        if (count($data)> 0) {

            foreach ($data as $key => $value) {
                $select[$value->id] = [''=>'Select Stone Size'];
                $sizes = $value->stoneSizes;
                if (count($sizes) > 0) {
                    foreach ($sizes as $size) {
                        // $select[$value->id][$size->id] = $size->sizes->name.' (+'.money_format('$%!.2n',$size->price).')';
                        $select[$value->id][$size->id] = $size->sizes->name;

                    }
                }
            }
        }
        return $select;
    }

    public function prepareTableColumns()
    {
        $columns =  [
            [
                'label'=>'ID',
                'field'=> 'id',
                'filterable'=> true
            ], [
                'label'=>'Size Name',
                'field'=> 'size_name',
                'filterable'=> true
            ], [
                'label'=>'Stone Name',
                'field'=> 'stone_name',
                'filterable'=> true
            ], [
                'label'=>'Price',
                'field'=> 'price',
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
                
                // stone name
                $rows[$key]['size'] = $value->sizes->size;

                // size_name
                $rows[$key]['name'] = $value->sizes->name;

                // input_name
                $rows[$key]['input_name'] = "stone_size[{$value->id}]";

                // append last column to table here
                $last_column = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewModal-'.$value->id.'" type="button">view</button>';
                $last_column .= '</div>';
                $rows[$key]['action'] = $last_column;
            }
        }

        return $rows;
    }


    public static function countStoneSizes()
    {
        return StoneSize::count();
    }
}