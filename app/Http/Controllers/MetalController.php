<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use App\ItemMetal;
use App\Metal;
use Illuminate\Http\Request;

class MetalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Metal $metal)
    {
        $columns = $metal->prepareTableColumns();
        $rows = $metal->prepareTableRows($metal->all());
        return view('metals.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Metal $metal, InventoryItem $inventoryItem)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        flash('Successfully created a Metal!')->success();
        $m = $metal->create(request()->all());
        if ($m) {
            $inventoryItems = $inventoryItem->all();
            if (count($inventoryItems) > 0) {
                $inventoryItems->each(function($value,$key) use($m) {
                    $itemMetal = new ItemMetal;
                    $itemMetal->inventory_item_id = $value->id;
                    $itemMetal->metal_id = $m->id;
                    $itemMetal->price = 0;
                    $itemMetal->active = false;
                    $itemMetal->save();
                });
            }
        }
        return redirect()->route('metal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metal  $metal
     * @return \Illuminate\Http\Response
     */
    public function show(Metal $metal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metal  $metal
     * @return \Illuminate\Http\Response
     */
    public function edit(Metal $metal)
    {
        return view('metals.edit', compact('metal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metal  $metal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metal $metal)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        if ($metal->update($request->all())) {
            flash('You have successfully edited '.$metal->name)->success();
            return redirect()->route('metal.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metal  $metal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metal $metal)
    {
        $metal_name = $metal->name;
        $metal->itemMetals()->delete();
        if ($metal->delete()) {
            flash('You have successfully deleted '.$metal_name)->success();
            return redirect()->back();
        }
    }
}
