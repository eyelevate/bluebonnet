<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finger extends Model
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

    public function prepareSelect($data)
    {
        $select = [''=>'Select Finger Size'];
        if(isset($data)) {
            foreach ($data as $key => $value) {
                $select[$value->id] = $value->name;
            }
        }

        return $select;
    }

    public function prepareTableColumns()
    {
        $columns =  [
            [

                'label'=>'Size',
                'field'=> 'size',
                'filterable'=> true
            
            ], [
                'label'=>'Unit',
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

    public static function countFingers()
    {
        return Finger::count();
    }
}
