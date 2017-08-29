<?php

namespace App\Http\Controllers;


use App\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
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
        //
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
}
