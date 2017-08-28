<?php

namespace App\Http\Controllers;

use App\StoneSize;
use Illuminate\Http\Request;
use App\Stone;
use App\Size;

class StoneSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoneSize $stoneSize)
    {
         $columns = $stoneSize->prepareTableColumns();
         $rows = $stoneSize->prepareTableRows($stoneSize->all());
         return view('stone_sizes.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoneSize $stoneSize, Size $size)
    {
        $columns = $size->prepareTableColumns();
        $rows = $size->prepareTableRows($size->where('size'));
        return view('stone_sizes.create', compact(['colums', 'rows']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoneSize $stoneSize)
    {
        // $this->validate(request(), [
        //      'size' => 'required|numeric',
        //      'name' => 'required|string'
        // ]);
        // flash('Successfully created a Stone Size!')->success();
        // $stoneSize->create(request()->all());
        // return redirect()->route('stone_size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoneSize  $stoneSize
     * @return \Illuminate\Http\Response
     */
    public function show(StoneSize $stoneSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoneSize  $stoneSize
     * @return \Illuminate\Http\Response
     */
    public function edit(StoneSize $stoneSize)
    {
        // return view('stone_sizes.edit', compact('stoneSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoneSize  $stoneSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoneSize $stoneSize)
    {
        // $this->validate(request(), [
        //     'size' => 'required|numeric'
        // ]);

        // if ($stoneSize->update($request->all())) {
        //     flash('You have successfully edited '.$stoneSize->size)->success();
        //     return redirect()->route('stone_size.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoneSize  $stoneSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoneSize $stoneSize)
    {
        // $stone_size_name = $stoneSize->size;
        // if ($stoneSize->delete()) {
        //     flash('You have successfully deleted '.$stone_size_name)->success();
        //     return redirect()->back();
        // }
    }
}
