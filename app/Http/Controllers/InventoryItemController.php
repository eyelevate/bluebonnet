<?php

namespace App\Http\Controllers;

use App\Finger;
use App\Image;
use App\Inventory;
use App\InventoryItem;
use App\Job;
use App\Metal;
use App\Stone;
use App\StoneSize;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class InventoryItemController extends Controller
{

    private $layout;
    private $view;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $theme = 2;
        $this->layout = $job->switchLayout($theme);
        $this->view = $job->switchHomeView($theme);
        setlocale(LC_MONETARY, 'en_US.UTF-8');
    }
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
    public function store(Request $request, Inventory $inventory, InventoryItem $inventory_item, Image $image)
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
                        // store the newly created and resized image into the storage folder with a unique token as a name and return the path for db storage
                        $resized_image_uri = $image->resize($request->imgs[$key],480,480);
                        $path = Storage::putFile('public/inventory_items', new File($resized_image_uri));

                        //Now delete temporary intervention image as we have moved it to Storage folder with Laravel filesystem.
                        unlink($resized_image_uri);

                        // Featured images
                        $featured_src = NULL;
                        $primary_image = $request->primary_image[$key] == 'true' ? true : false;

                        $resized_featured_uri = $image->resize($request->imgs[$key],900,900);
                        $featured_path = Storage::putFile('public/inventory_items',new File($resized_image_uri));
                        unlink($resized_featured_uri);
                        $featured_src = $featured_path;

                        $img = new Image();
                        $img->inventory_id = $inventory->id;
                        $img->inventory_item_id = $inventory_item->id;
                        $img->primary = $primary_image;
                        $img->featured = $inventory_item->featured;
                        $img->img_src = $path;
                        $img->featured_src = $featured_src;
                        $img->ordered = $key;
                        $img->save();
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
    public function shop(InventoryItem $inventoryItem, Finger $finger, Metal $metal, Stone $stone, StoneSize $stoneSize)
    {
        $layout = $this->layout;
        $fingers = $finger->prepareSelect($finger->all());
        $metals = $metal->prepareSelect($metal->all());
        $stones = $stone->all();
        $stone_select = $stone->prepareSelect($stone->all());
        $stone_sizes = $stoneSize->prepareSelect($stone->all());
        return view('inventory_items.shop',compact(['layout','inventoryItem','fingers','metals','stones','stone_select','stone_sizes']));
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
    public function update(Request $request, InventoryItem $inventory_item, Image $image)
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
            // set all primary images to false 
            $inventory_item->images()->update(['primary'=>false]);

            // loop primary images array check for true set primary if true also compare to imgs and remove deleted image
            $old_count = count($request->old_image);

            if ($old_count > 0) {


                // loop through the old images first
                foreach ($original_images as $old) {
                    $old_id = $old->id;
                    if(count($request->old_image) > 0) {
                        $pass = false;
                        
                        foreach ($request->old_image as $oldkey => $oldvalue) {
                            if($oldvalue['old'] === "true") {
                                $check_old_id = $oldvalue['id'];
                                if($check_old_id == $old_id) {
                                    $img = Image::find($old_id);
                                    $img->primary = ($request->primary_image[$oldkey] == "true" || $request->primary_image[$oldkey] == "1") ? true : false;

                                    if ($img->save()) {
                                        $pass = true;
                                    }
                                    break;
                                }
                            }
                        }
                        if (!$pass) { // remove old image from storage and from db
                            Storage::delete($old->img_src);
                            Storage::delete($old->featured_src);
                            $img = Image::find($old->id);
                            $img->delete();
                        }
                    }
                }
            } else {
                if(count($inventory_item->images) > 0) {
                    foreach ($inventory_item->images as $imgs) {
                        Storage::delete($imgs->img_src);
                        Storage::delete($imgs->featured_src);
                    }
                }
                $inventory_item->images()->delete();

            }

            // Add in new images
            if (count($request->imgs) > 0) {
                // Save any new images
                foreach ($request->imgs as $key => $value) {
                    $check_count = $key + $old_count;

                    // store the newly created and resized image into the storage folder with a unique token as a name and return the path for db storage
                    $resized_image_uri = $image->resize($request->imgs[$key],480,480);
                    $path = Storage::putFile('public/inventory_items', new File($resized_image_uri));

                    //Now delete temporary intervention image as we have moved it to Storage folder with Laravel filesystem.
                    unlink($resized_image_uri);

                    // Featured images
                    $featured_src = NULL;
                    $primary_image = ($request->primary_image[$check_count] == "true" || $request->primary_image[$check_count] == "1") ? true : false;
                    $resized_featured_uri = $image->resize($request->imgs[$key],900,900);
                    $featured_path = Storage::putFile('public/inventory_items',new File($resized_image_uri));
                    unlink($resized_featured_uri);
                    $featured_src = $featured_path;
                    
                    $img = new Image();
                    $img->inventory_id = $inventory_item->inventory_id;
                    $img->inventory_item_id = $inventory_item->id;
                    $img->primary = $primary_image;
                    $img->featured = $inventory_item->featured;
                    $img->img_src = $path;
                    $img->featured_src = $featured_src;
                    $img->ordered = $key;
                    $img->save();
                    //

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

    public function subtotal(Request $request, InventoryItem $inventoryItem)
    {
        $quantity = $request->quantity;
        $metal_id = $request->metal_id;
        $stone_id = $request->stone_id;
        $stone_size_id = $request->size_id;

        $subtotal = $inventoryItem->getSubtotal($inventoryItem,$quantity,$metal_id,$stone_id, $stone_size_id);
        if ($subtotal) {
            return response()->json([
                'subtotal' => $subtotal,
                'subtotal_formatted'=>"$".number_format($subtotal, 2,'.',',')
            ]);
        } else {
            return response()->json([
                'subtotal' => 0,
                'subtotal_formatted' => 'Contact for estimate'
            ]);
        }
        
    }
}
