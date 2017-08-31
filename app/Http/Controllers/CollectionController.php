<?php

namespace App\Http\Controllers;


use App\Collection;
use App\Job;
use App\Inventory;
use App\InventoryItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CollectionController extends Controller
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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Collection $collection)
    {
        $columns = $collection->prepareTableColumns();
        $rows = $collection->prepareTableRows($collection->all());
        return view('collections.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Collection $collection)
    {
        $this->validate(request(), [
             'name' => 'required|string|max:255',
             'img'=>'required | mimes:jpeg,jpg,png | max:10000'
        ]);
        $path = $request->img->store('public/collections');
        $request->merge(['active'=>($request->active == 'on') ? true : false]);
        $request->merge(['featured'=>($request->featured == 'on') ? true : false]);
        $request->merge(['img_src'=>$path]);
        flash('Successfully created a Collection!')->success();
        $collection->create($request->all());
        return redirect()->route('collection.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        $layout = $this->layout;
        $collections = $collection->prepareForShow($collection);
        return view('collections.show',compact('layout','collections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $Collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {

        return view('collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CollectionController  $collectionController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //Validate the form
        $this->validate(request(), [
             'name' => 'required|string|max:255',
             'img'=>'mimes:jpeg,jpg,png | max:10000'
        ]);
        $request->merge(['active'=>($request->active == 'on') ? true : false]);
        $request->merge(['featured'=>($request->featured == 'on') ? true : false]);

        if ($request->hasFile('img')) {
            // remove old image
            Storage::delete($collection->img_src);
            // add new image
            $path = $request->img->store('public/collections');
            $request->merge(['img_src'=>$path]);
        }
        
        flash('Successfully updated a Collection!')->success();
        $collection->update($request->all());
        return redirect()->route('collection.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collectionController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        // delete collection images

        if ($collection->img_src) {
            Storage::delete($collection->img_src);
        }

        // remove links to inventory items

        // delete collection
        if($collection->delete())
        {
            flash('You have successfully deleted a collection.')->success();
            return redirect()->route('collection.index');
        }
    }

    public function set(Collection $collection, Inventory $inventory)
    {
        $inventory_select = $inventory->prepareSelect();
        $inventories = $inventory->prepareForSet($collection->id);
        return view('collections.set',compact(['collection','inventory_select','inventories']));
    }

    public function add(Request $request, Collection $collection, Inventory $inventory)
    {
        $status = 'fail';
        if (!$collection->collectionItem()->where('inventory_item_id',$request->inventory_item_id)->exists()) {
            $status = 'success';
            $collection->collectionItem()->attach($request->inventory_item_id);
        }

        $inventories = $inventory->prepareForSet($collection->id);
        

        return response()->json([
            'status' => $status,
            'inventories' => $inventories
        ]);
    }

    public function remove(Request $request, Collection $collection, Inventory $inventory)
    {
        $status = 'fail';
        if ($collection->collectionItem()->where('inventory_item_id',$request->inventory_item_id)->exists()) {
            $status = 'success';
            $collection->collectionItem()->detach($request->inventory_item_id);
        }

        $inventories = $inventory->prepareForSet($collection->id);
        

        return response()->json([
            'status' => $status,
            'inventories' => $inventories
        ]);
    }
}
