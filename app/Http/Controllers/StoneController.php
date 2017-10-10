<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use App\ItemStone;
use App\ItemSize;
use App\Size;
use App\Stone;
use App\StoneSize;
use Illuminate\Http\Request;

class StoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Stone $stone, Size $size, StoneSize $stone_size)
    {
        $columns = $stone->prepareTableColumns();
        $rows = $stone->prepareTableRows($stone->all());
        $sizes = $size->all();
        
        $size_columns = $size->prepareTableIndexColumns();
        $size_rows = $size->prepareTableRows($sizes);
        return view('stones.index', compact(['columns','rows','size_columns','size_rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Size $size)
    {
        $sizes = $size->prepareData($size->orderBy('size', 'asc')->get());
        return view('stones.create', compact(['sizes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Stone $stone, Size $size, InventoryItem $inventoryItem)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        $request->merge(['email'=>($request->email == 'on') ? true : false]);

        // Save the first request data to stones
        $s = $stone->create($request->all());
        if ($s) {
            if (!$s->email) {
                $inventoryItems = $inventoryItem->all();
                if (count($inventoryItems) > 0) {
                    $inventoryItems->each(function($value,$key) use ($s) {
                        $itemStone = new ItemStone;
                        $itemStone->stone_id = $s->id;
                        $itemStone->inventory_item_id = $value->id;
                        $itemStone->price = 0;
                        $itemStone->active = false;
                        $itemStone->save();
                    });
                }
                $sizes = $size->all();
                if (count($sizes) > 0) {
                    $sizes->each(function($value,$key) use($s, $inventoryItems) {
                        // item stone

                        // stone sizes and item size
                        $stoneSize = new StoneSize;
                        $stoneSize->size_id = $value->id;
                        $stoneSize->stone_id = $s->id;
                        $stoneSize->price = 0;
                        if($stoneSize->save()) {
                            if(count($inventoryItems) > 0) {
                                $inventoryItems->each(function($ivalue,$ikey) use ($stoneSize) {
                                    $itemSize = new ItemSize;
                                    $itemSize->stone_size_id = $stoneSize->id;
                                    $itemSize->inventory_item_id = $ivalue->id;
                                    $itemSize->price = 0;
                                    $itemSize->active = false;
                                    $itemSize->save();
                                });
                            }
                            
                        }

                    });
                }
            }
            
        }
        flash('Successfully created a stone!')->success();
        return redirect()->route('stone.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stone  $stone
     * @return \Illuminate\Http\Response
     */
    public function show(Stone $stone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stone  $stone
     * @return \Illuminate\Http\Response
     */
    public function edit(Stone $stone, Size $size, StoneSize $stone_size)
    {
        $sizes = (count($stone->stoneSizes) > 0) ? $stone_size->prepareTableRows($stone->stoneSizes) : $size->prepareData($size->orderBy('size','asc')->get());
        return view('stones.edit', compact(['stone','sizes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stone  $stone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stone $stone)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        $request->merge(['email'=>($request->email == 'on') ? true : false]);

        // Save the first request data to stones
        $save = $stone->update($request->all());
        flash('Successfully updated a stone!')->success();

        return redirect()->route('stone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stone  $stone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stone $stone)
    {
        $stone_name = $stone->name;
        if (count($stone->stoneSizes) > 0) {
            foreach ($stone->stoneSizes as $ss) {
                $ss->itemSizes()->delete();               
            }
        }

        $stone->itemStones()->delete();
        if ($stone->delete()) {
            flash('You have successfully deleted '.$stone_name)->success();
            return redirect()->back();
        }
    }
}
