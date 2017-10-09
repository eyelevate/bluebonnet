<?php

namespace App\Http\Controllers;

use App\Size;
use App\Stone;
use App\StoneSize;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Size $size)
    {
        $columns = $size->prepareTableColumns();
        $rows = $size->prepareTableRows($size->orderBy('size','asc')->get());
        return view('sizes.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Size $size, Stone $stone)
    {
        $this->validate(request(), [
            'size' => 'required|numeric',
            'name' => 'required|string'
        ]);
        flash('Successfully created a Stone Size!')->success();
        $sizes = $size->create(request()->all());
        if($sizes) {
            // update stone_sizes
            $stones = $stone->where('email',false)->get();
            $stones->each(function($value,$key) use ($sizes){

                $stoneSize = new StoneSize;
                $stoneSize->size_id = $sizes->id;
                $stoneSize->stone_id = $value->id;
                $stoneSize->price = 0;
                $stoneSize->save();
                return $value;
            });

        }
        return redirect()->route('size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $this->validate(request(), [
            'size' => 'required|numeric'
        ]);

        if ($size->update($request->all())) {
            flash('You have successfully edited '.$size->size)->success();
            return redirect()->route('size.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size_name = $size->size;
        $size->stoneSizes()->delete();
        if ($size->delete()) {
            flash('You have successfully deleted '.$size_name)->success();
            return redirect()->back();
        }
    }
}
