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

    public function prepareTableColumns()
    {
        $columns =  [
            [
                'label'=>'ID',
                'field'=> 'id',
                'filterable'=> true
            ], [
                'label'=>'Size Name',
                'field'=> 'size_id',
                'filterable'=> true
            ], [
                'label'=>'Stone Name',
                'field'=> 'stone_id',
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

    public function prepareTableRows($rows)
    {
        // check if exists
        if (isset($rows)) {
            foreach ($rows as $key => $value) {
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
        return Stone::count();
    }
}