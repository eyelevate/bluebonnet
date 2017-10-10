<?php

namespace App;


use \App\StoneSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stone extends Model
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
        'price',
        'email'
    ];

    public function stoneSizes()
    {
        return $this->hasMany(StoneSize::class,'stone_id','id');
    }


    #public
    public function prepareSelect($data)
    {
        $select = [''=>'Select Stone Type'];
        if(isset($data)) {
            foreach ($data as $key => $value) {
                $select[$value->id] = ($value->desc) ? "{$value->name} ({$value->desc})" : $value->name;
            }
        }

        return $select;
    }

    public function prepareData($data)
    {
        $data->transform(function($value,$key){
            $value['email_status'] = ($value->email) ? 'True' : 'False';
            $size = new Size;
            $value['sizes'] = $size->orderBy('carat','asc')->get();

            return $value;
        });


        return $data;
    }

    public function prepareDataEdit($data)
    {
        $data->transform(function($value,$key){
            $value['email_status'] = ($value->email) ? 'True' : 'False';
            $size = new Size;
            $sizes = $size->orderBy('carat','asc')->get();
            

            return $value;
        });


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
                'label'=>'Price',
                'field'=> 'price',
                'filterable'=> true
            ], [
                'label'=>'Email',
                'field'=> 'email_status',
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
        $stone_size = new StoneSize;
        // check if exists
        if (isset($rows)) {
            foreach ($rows as $key => $value) {
                // append last column to table here
                $last_column = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewModal-'.$value->id.'" type="button">view</button>';
                $last_column .= '</div>';
                $rows[$key]['action'] = $last_column;

                // check email if true or false 
                if (isset($rows[$key]['email'])) {
                    if ($rows[$key]['email'] == false) {
                        $rows[$key]['email_status'] = 'False';
                    } else {
                        $rows[$key]['email_status'] = 'True';
                    }
                }

                // stone price update
                if (isset($rows[$key]['price'])) {
                    $rows[$key]['price'] = number_format($value->price, 2,".",",");
                }

                // stone sizes update
                if (count($rows[$key]['stoneSizes']) > 0) {
                    $rows[$key]['stoneSizes'] = $stone_size->prepareTableRows($value->stoneSizes);
                }
            }
        }

        return $rows;
    }

    #Static
    public static function countStones()
    {
        return Stone::count();
    }
}
