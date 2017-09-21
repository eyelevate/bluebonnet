<?php

namespace App\Http\Controllers;

use App\Finger;
use App\Image;
use App\Inventory;
use App\InventoryItem;
use App\ItemMetal;
use App\ItemStone;
use App\ItemSize;
use App\Job;
use App\Metal;
use App\Stone;
use App\StoneSize;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Session;

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
    public function create(Inventory $inventory, Stone $stone, Metal $metal)
    {
        $stones = $stone->prepareData($stone->all());
        $metals = $metal->all();
        return view('inventory_items.create',compact('inventory','stones','metals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inventory $inventory, InventoryItem $inventory_item, Image $image, Video $video)
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
        $inventory_item->fingers = ($request->fingers == 'on') ? true : false;
        $inventory_item->sizes = ($request->stones) ? ($request->sizes == 'on') ? true : false : false;
        $inventory_item->featured = ($request->featured == 'on') ? true : false;

        if ($inventory_item->save()) {
            if ($inventory_item->metals) {
                // add item metals
                if (count($request->itemMetal) > 0) {
                    foreach ($request->itemMetal as $key => $value) {
                        $im = new ItemMetal();
                        $im->inventory_item_id = $inventory_item->id;
                        $im->metal_id = $key;
                        $im->price = (isset($value['price'])) ? $value['price'] : null;
                        $im->active = (isset($value['active'])) ? ($value['active'] == 'on') ? true : false : false;
                        $im->save();
                    }
                }
            }
            if ($inventory_item->stones) {
                // add item stones
                if (count($request->itemStone) > 0) {
                    foreach ($request->itemStone as $key => $value) {
                        $istone = new ItemStone();
                        $istone->inventory_item_id = $inventory_item->id;
                        $istone->stone_id = $key;
                        $istone->price = (isset($value['price'])) ? $value['price'] : null;
                        $istone->active = (isset($value['active'])) ? ($value['active'] == 'on') ? true : false : false;
                        $istone->save();
                    }
                }
                if ($inventory_item->sizes) {
                    // add item sizes 
                    if (count($request->itemSize) > 0) {
                        foreach ($request->itemSize as $key => $value) {
                            $isize = new ItemSize();
                            $isize->inventory_item_id = $inventory_item->id;
                            $isize->stone_size_id = $key;
                            $isize->price = (isset($value['price'])) ? $value['price'] : null;
                            $isize->active = (isset($value['active'])) ? ($value['active'] == 'on') ? true : false : false;
                            $isize->save();
                        }
                    }
                }
            }
            

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
            if (count($request->videos) > 0) {
                foreach ($request->videos as $key => $value) {
                    $path = Storage::putFile('public/videos', $value);

                    // Featured images
                    $vids = new Video();
                    $vids->inventory_id = $inventory->id;
                    $vids->inventory_item_id = $inventory_item->id;
                    $vids->src = $path;
                    $vids->type = $value->getMimeType();
                    $vids->ordered = $key;
                    $vids->save();
                

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
    public function shop(InventoryItem $inventoryItem, Finger $finger, ItemMetal $itemMetal, ItemStone $itemStone, ItemSize $itemSize, Stone $stone)
    {
        $layout = $this->layout;
        $fingers = $finger->prepareSelect($finger->all());
        $metals = $itemMetal->prepareSelect($inventoryItem->itemMetal);
        $stones = $stone->all();
        $stone_select = $itemStone->prepareSelect($inventoryItem->itemStone);
        $stone_sizes = $itemSize->prepareSelect($inventoryItem);

        
        return view('inventory_items.shop',compact(['layout','inventoryItem','fingers','metals','stones','stone_select','stone_sizes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryItem $inventoryItem, Image $image,Stone $stone, Metal $metal)
    {

        $inventoryItem = $inventoryItem->prepareDataSingle($inventoryItem);
        $stones = $stone->prepareData($inventoryItem->itemStone);
        $metals = $metal->all();
        $image_variables = $image->prepareVariableInventoryItems($inventoryItem->images);
        return view('inventory_items.edit',compact(['inventoryItem','image_variables','stones','metals']));
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

        // $this->validate(request(), [
        //     'name' => 'required|string|max:255',
        //     'subtotal' => 'required'
        // ]);

        $original_images = $inventory_item->images;
        $original_videos = $inventory_item->videos;
        $inventory_item->name = $request->name;
        $inventory_item->desc = $request->desc;
        $inventory_item->subtotal = $request->subtotal;
        $inventory_item->taxable = ($request->taxable == 'on') ? true : false;
        $inventory_item->active = ($request->active == 'on') ? true : false;
        $inventory_item->metals = ($request->metals == 'on') ? true : false;
        $inventory_item->stones = ($request->stones == 'on') ? true : false;
        $inventory_item->fingers = ($request->fingers == 'on') ? true : false;
        $inventory_item->sizes = ($request->stones) ? ($request->sizes == 'on') ? true : false : false;
        $inventory_item->featured = ($request->featured == 'on') ? true : false;
        if ($inventory_item->save()) {
            if ($inventory_item->metals) {
                if (count($request->itemMetal) > 0) {
                    foreach ($request->itemMetal as $key => $value) {
                        $im = new ItemMetal();
                        if (count($inventory_item->itemMetal)>0) {
                            $im = ItemMetal::find($key);
                        } else {
                            $im->inventory_item_id = $inventory_item->id;
                            $im->metal_id = $key;
                        }
                        $im->price = (isset($value['price'])) ? $value['price'] : null;
                        $im->active = (isset($value['active'])) ? ($value['active'] == 'on') ? true : false : false;
                        
                        $im->save();
                    }
                }
                
            } 
            if ($inventory_item->stones) {
                // add item stones
                if (count($request->itemStone) > 0) {
                    foreach ($request->itemStone as $key => $value) {
                        
                        $istone = new ItemStone();
                        if (count($inventory_item->itemStone)>0) {
                            $istone = ItemStone::find($key);
                            
                        } else {
                            
                            $istone->inventory_item_id = $inventory_item->id;
                            $istone->stone_id = $key;
                        }
                        $istone->price = (isset($value['price'])) ? $value['price'] : null;
                        $istone->active = (isset($value['active'])) ? ($value['active'] == 'on') ? true : false : false;
                        $istone->save();
                    }
                }    
            
                if ($inventory_item->sizes) {
                    // add item sizes 
                    if (count($request->itemSize) > 0) {
                        foreach ($request->itemSize as $key => $value) {
                            $isize = new ItemSize();
                            if (count($inventory_item->itemSize)>0) {
                                $isize = ItemSize::find($key);
                            } else {
                                $isize->inventory_item_id = $inventory_item->id;
                                $isize->stone_size_id = $key;
                            }
                            
                            $isize->price = (isset($value['price'])) ? $value['price'] : null;
                            $isize->active = (isset($value['active'])) ? ($value['active'] == 'on') ? true : false : false;
                            $isize->save();
                        }
                    }
                }
            }

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

            // check for old videos
            $old_videos_count = count($original_videos);
            if ($old_videos_count > 0) {
                // loop through the old images first
                foreach ($original_videos as $old) {

                    if (!array_key_exists($old->id,$request->ovideos)) {

                        Storage::delete($old->src);
                        $vids = Video::find($old->id);
                        $vids->delete();
                    }
                }
            } else {
                if(count($inventory_item->videos) > 0) {
                    foreach ($inventory_item->videos as $vids) {
                        Storage::delete($vids->src);
                    }
                }
                $inventory_item->videos()->delete();
            }

            if (count($request->videos) > 0) {
                $last = $inventory_item->videos()->latest()->first();

                $last_ordered = (isset($last)) ? $last->ordered : 0;
                foreach ($request->videos as $key => $value) {
                    $last_ordered++;
                    $path = Storage::putFile('public/videos', $value);

                    // Featured images
                    $vids = new Video();
                    $vids->inventory_id = $inventory_item->inventory_id;
                    $vids->inventory_item_id = $inventory_item->id;
                    $vids->src = $path;
                    $vids->type = $value->getMimeType();
                    $vids->ordered = $last_ordered;
                    $vids->save();
                

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

    /**
     * Ajax request coming from /js/views/inventory_items/shop.js.
     *
     * @param  \App\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function subtotal(Request $request, InventoryItem $inventoryItem)
    {
        $quantity = $request->quantity;
        $metal_id = $request->metal_id;
        $stone_id = $request->stone_id;
        $stone_size_id = $request->size_id;

        $subtotal = $inventoryItem->getSubtotal($inventoryItem,$quantity,$metal_id,$stone_id, $stone_size_id);
        if ($subtotal) {
            return response()->json([
                'subtotal' => number_format($subtotal,2,'.',''),
                'subtotal_formatted'=>"$".number_format($subtotal, 2,'.',',')
            ]);
        } else {
            return response()->json([
                'subtotal' => '0.00',
                'subtotal_formatted' => 'Contact for estimate'
            ]);
        }
        
    }

    public function subtotalAdmin(Request $request, InventoryItem $inventoryItem)
    {
        $quantity = $request->quantity;
        $metal_id = $request->metal_id;
        $stone_id = $request->stone_id;
        $stone_size_id = $request->size_id;
        $custom_price = $request->custom_price;

        $subtotal = $inventoryItem->getSubtotalAdmin($inventoryItem,$quantity,$metal_id,$stone_id, $stone_size_id, $custom_price);
        if ($subtotal) {
            return response()->json([
                'subtotal' => number_format($subtotal,2,'.',''),
                'subtotal_formatted'=>"$".number_format($subtotal, 2,'.',',')
            ]);
        } else {
            return response()->json([
                'subtotal' => '0.00',
                'subtotal_formatted' => 'Contact for estimate'
            ]);
        }
        
    }

    public function addToCart(Request $request, InventoryItem $inventoryItem, ItemStone $itemStone)
    {
        // Check if stone is an email or not
        $email = $itemStone->checkEmail($request->stone_id);
        
        if($inventoryItem->metals && $inventoryItem->stones && $inventoryItem->sizes && $inventoryItem->fingers) {
            if ($email) {
                $this->validate(request(), [
                    'quantity' => 'required',
                    'finger_id' => 'required',
                    'metal_id' => 'required',
                    'stone_id' => 'required'
                ]);
            } else {
                $this->validate(request(), [
                    'quantity' => 'required',
                    'finger_id' => 'required',
                    'metal_id' => 'required',
                    'stone_id' => 'required',
                    "stone_size_id.{$request->stone_id}"=>'required'
                ]);
            }
            
            
        } elseif ($inventoryItem->metals && !$inventoryItem->stones && $inventoryItem->fingers) {

            $this->validate(request(), [
                'quantity' => 'required',
                'finger_id' => 'required',
                'metal_id' => 'required'
            ]);
            
        } elseif (!$inventoryItem->metals && $inventoryItem->stones && $inventoryItem->sizes && $inventoryItem->fingers) {
            if ($email) {
                $this->validate(request(), [
                    'quantity' => 'required',
                    'finger_id' => 'required',
                    'stone_id' => 'required'
                ]);
            } else {
                $this->validate(request(), [
                    'quantity' => 'required',
                    'finger_id' => 'required',
                    'stone_id' => 'required',
                    "stone_size_id.{$request->stone_id}"=>'required'
                ]);
            }
            
            
        } elseif ($inventoryItem->metals && $inventoryItem->stones && !$inventoryItem->sizes && $inventoryItem->fingers) {
            $this->validate(request(), [
                'quantity' => 'required',
                'finger_id' => 'required',
                'metal_id' => 'required',
                'stone_id' => 'required'
            ]);
        } elseif(!$inventoryItem->fingers && $inventoryItem->metals && $inventoryItem->sizes && $inventoryItem->stones) {
            if ($email) {
                $this->validate(request(), [
                    'quantity' => 'required',
                    'metal_id' => 'required',
                    'stone_id' => 'required'
                    
                ]);
            } else {
                $this->validate(request(), [
                    'quantity' => 'required',
                    'metal_id' => 'required',
                    'stone_id' => 'required',
                    "stone_size_id.{$request->stone_id}"=>'required'
                ]);
            }
            
        } elseif(!$inventoryItem->fingers && $inventoryItem->metals && !$inventoryItem->sizes && $inventoryItem->stones) {
            $this->validate(request(), [
                'quantity' => 'required',
                'metal_id' => 'required',
                'stone_id' => 'required'
                
            ]);
            
        } else {

            $this->validate(request(), [
                'quantity' => 'required',
            ]);
            
        }
        $row = [
                'shipping' => 1, // ground basic shipping + $0.00
                'quantity' => $request->quantity,
                'inventoryItem'=>$inventoryItem,
                'finger_id'=>$request->finger_id,
                'metal_id'=>$request->metal_id,
                'stone_id'=>$request->stone_id,
                'stone_size_id'=>$request->stone_size_id[$request->stone_id],
                'email'=>$email
                ];
        
        if (session()->has('cart')) {
            session()->push('cart',$row);
            
        } else {
            session()->put('cart.0',$row);
        }
        
        return redirect()->route('home.cart');
        
    }

    public function deleteCartItem(Request $request, InventoryItem $inventoryItem)
    {
        $row = $request->row;

        session()->forget('cart.'.$row);
        $totals = $inventoryItem->prepareTotals(session()->get('cart'));

        return response()->json([
            'status' => true,
            'data'=>session()->get('cart'),
            'totals'=>$totals
        ]);
    }

    public function findItems(Request $request, InventoryItem $inventoryItem)
    {
        $query = $request->name;
        $notIn = $request->selected;
        $inventoryItems = $inventoryItem->prepareForShowInventory($inventoryItem->whereNotIn('id',$notIn)->where('name','like','%'.$query.'%')->orderBy('name','asc')->get());

        return response()->json([
            'status' => true,
            'items'=> $inventoryItems
        ]);
    }

    public function getOptions(Request $request, InventoryItem $inventoryItem, Finger $finger, ItemMetal $itemMetal, ItemStone $itemStone, ItemSize $itemSize, Stone $stone)
    {
        $ids = $request->selected;
        $inventoryItems = $inventoryItem->prepareForShowInventory($inventoryItem->whereIn('id',$ids)->get());
        $fingers = $finger->prepareSelect($finger->all());
        $stones = $stone->all();
     
        $selected = [];

        if (count($inventoryItems) > 0) {
            foreach ($inventoryItems as $item) {
                $stone_select = $itemStone->prepareSelect($item->itemStone);
                $stone_sizes = $itemSize->prepareSelect($item);
                $metals = $itemMetal->prepareSelect($item->itemMetal);
                $stones_compare = $itemStone->stonesCompare($item->itemStone);
                $row = [
                    'quantity_select'=>[1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10],
                    'quantity'=>1,
                    'fingers'=>$fingers,
                    'finger_id'=>NULL,
                    'stones'=>$stones,
                    'inventoryItem'=>$item,
                    'stone_select'=>$stone_select,
                    'stone_id'=>NULL,
                    'stone_sizes'=>$stone_sizes,
                    'stones_compare'=>$stones_compare,
                    'stone_size_id'=>NULL,
                    'metals'=>$metals,
                    'metal_id'=>NULL,
                    'subtotal'=>'0.00',
                    'subtotal_formatted'=>'$0.00',
                    'shipping'=> 1,
                    'errors'=>[
                        'finger_id'=> false,
                        'stone_id'=> false,
                        'stone_size_id'=> false,
                        'metal_id'=> false,
                        'subtotal'=> false,
                    ]
                ];
                array_push($selected, $row);
            }   
        }
        return response()->json([
            'status' => true,
            'selected'=> $selected
        ]);

    }

    public function getTotals(Request $request, InventoryItem $inventoryItem)
    {
        $items = $request->items;

        $totals = $inventoryItem->prepareTotalsFinish($items);

        return response()->json([
            'status'=>true,
            'totals'=>$totals
        ]);
    }
    public function getTotalsEdit(Request $request, InventoryItem $inventoryItem)
    {
        $items = $request->items;
        $shippingTotal = $request->shippingTotal;

        $totals = $inventoryItem->prepareTotalsFinishEdit($items, $shippingTotal);

        return response()->json([
            'status'=>true,
            'totals'=>$totals
        ]);
    }
}
