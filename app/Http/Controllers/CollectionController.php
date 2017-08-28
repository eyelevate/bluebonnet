<?php

namespace App\Http\Controllers;


use App\Collection;
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
             'name' => 'required|string|max:255'
        ]);
        flash('Successfully created a Stone Size!')->success();
        $collection->create(request()->all());
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
            'name' => 'required|string|max:255'
        ]);
        flash('Successfully updated Collection!')->success();
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
        if($collection->delete())
        {
            flash('You have successfully deleted a collection.')->success();
            return redirect()->route('collection.index');
        }
    }
}
