<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
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
        'active',
        'img_src',
        'status'
    ];

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
                'label'=>'Image',
                'field'=> 'img_src',
                'filterable'=> true
            ], [
                'label'=>'Active',
                'field'=> 'active_status',
                'html'=>true
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

                if (isset($rows[$key]['active'])) {
                    $rows[$key]['active_status'] = ($rows[$key]['active']) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-active</span>';
                }

                // rename image path
                if (isset($rows[$key]['img_src'])) {
                    $rows[$key]['img_src'] = str_replace('public/', 'storage/', $value->img_src);
                }
            }
        }

        return $rows;
    }
    public static function countCollections()
    {
        return Collection::count();
    }
}
