<?php

namespace App\Http\Controllers;

use App\Stone;
use Illuminate\Http\Request;

class StoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Stone $stone)
    {
        $columns = $stone->prepareTableColumns();
        $rows = $stone->prepareTableRows($stone->all());
        return view('stones.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Stone $stone)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        flash('Successfully created a Metal!')->success();
        $stone->create(request()->all());
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
    public function edit(Stone $stone)
    {
        return view('stones.edit', compact('stone'));
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

        if ($stone->update($request->all())) {
            flash('You have successfully edited '.$stone->name)->success();
            return redirect()->route('stone.index');
        }
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
        if ($stone->delete()) {
            flash('You have successfully deleted '.$stone_name)->success();
            return redirect()->back();
        }
    }
}
