<?php

namespace App\Http\Controllers;

use App\Image;
use App\Inventory;
use App\InventoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inventory $inventory)
    {
        return view('inventory_items.create',compact('inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inventory $inventory, InventoryItem $inventory_item)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'subtotal' => 'required'
        ]);

        $inventory_item->name = $request->name;
        $inventory_item->desc = $request->desc;
        $inventory_item->inventory_id = $inventory->id;
        $inventory_item->subtotal = $request->subtotal;
        $inventory_item->taxable = ($request->taxable == 'on') ? true : false;
        $inventory_item->active = ($request->active == 'on') ? true : false;
        $inventory_item->metals = ($request->metals == 'on') ? true : false;
        $inventory_item->stones = ($request->stones == 'on') ? true : false;
        $inventory_item->featured = ($request->featured == 'on') ? true : false;
        if ($inventory_item->save()) {
            // loop primary images array check for true set primary if true also compare to imgs and remove deleted images
            if (count($request->imgs) > 0) {
                foreach ($request->imgs as $key => $value) {
                    if (isset($request->primary_image[$key])) {
                        // send to the storage file
                        $path = $request->imgs[$key]->store('public/inventory_items');
                        $primary_image = $request->primary_image[$key] == 'true' ? true : false;
                        $image = new Image();
                        $image->inventory_id = $inventory->id;
                        $image->inventory_item_id = $inventory_item->id;
                        $image->primary = $primary_image;
                        $image->img_src = $path;
                        $image->ordered = $key;
                        $image->save();
                        //
                    } 
                }
            }
            flash('Successfully added a new inventory item.')->success();
            return redirect()->route('inventory.index');
        }

        flash('There was an error with your save.')->danger();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryItem $inventoryItem, Image $image)
    {
        $image_variables = $image->prepareVariableInventoryItems($inventoryItem->images);
        return view('inventory_items.edit',compact(['inventoryItem','image_variables']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryItem $inventory_item)
    {

        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'subtotal' => 'required'
        ]);
        $original_images = $inventory_item->images;
        $inventory_item->name = $request->name;
        $inventory_item->desc = $request->desc;
        $inventory_item->subtotal = $request->subtotal;
        $inventory_item->taxable = ($request->taxable == 'on') ? true : false;
        $inventory_item->active = ($request->active == 'on') ? true : false;
        $inventory_item->metals = ($request->metals == 'on') ? true : false;
        $inventory_item->stones = ($request->stones == 'on') ? true : false;
        $inventory_item->featured = ($request->featured == 'on') ? true : false;
        if ($inventory_item->save()) {
            // loop primary images array check for true set primary if true also compare to imgs and remove deleted images
            if (count($request->old_image) > 0) {
                // loop through the old images first
                foreach ($original_images as $old) {
                    $old_id = $old->id;
                    if(count($request->old_image) > 0) {
                        $pass = false;
                        
                        foreach ($request->old_image as $oldkey => $oldvalue) {
                            if($oldvalue['old'] === "true") {
                                $check_old_id = $oldvalue['id'];
                                if($check_old_id == $old_id) {
                                    $image = Image::find($old_id);
                                    $image->primary = ($request->primary_image[$oldkey] == "true" || $request->primary_image[$oldkey] == "1") ? true : false;
                                    if ($image->save()) {
                                        $pass = true;
                                    }
                                    break;
                                }
                            }
                        }
                        if (!$pass) { // remove old image from storage and from db
                            Storage::delete($old->img_src);
                            $image = Image::find($old->id);
                            $image->delete();
                        }
                    }
                }
            } else {
                if(count($inventory_item->images) > 0) {
                    foreach ($inventory_item->images as $imgs) {
                        Storage::delete($imgs->img_src);
                    }
                }
                $inventory_item->images()->delete();

            }

            // Add in new images
            if (count($request->imgs) > 0) {
                // Save any new images
                foreach ($request->imgs as $key => $value) {
  
                    if (isset($request->primary_image[$key])) {
                        // send to the storage file
                        $path = $request->imgs[$key]->store('public/inventory_items');
                        $primary_image = ($request->primary_image[$key] == "true" || $request->primary_image[$key] == "1") ? true : false;
                        $image = new Image();
                        $image->inventory_id = $inventory_item->inventory_id;
                        $image->inventory_item_id = $inventory_item->id;
                        $image->primary = $primary_image;
                        $image->img_src = $path;
                        $image->ordered = $key;
                        $image->save();
                        //
                    } 
                }
            }
            flash('Successfully updated an inventory item.')->success();
            return redirect()->route('inventory.index');
        }

        flash('There was an error with your save.')->danger();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryItem $inventoryItem)
    {
        // delete collection images

        if ($inventoryItem->images) {
            foreach ($inventoryItem->images as $image) {
                Storage::delete($image->img_src);
            }
            // delete images
            $inventoryItem->images()->delete();
        }
        // delete inventory item

        if($inventoryItem->delete()) {
            flash('You have successfully deleted this inventory item')->success();
        }

        return redirect()->back();
    }
}
