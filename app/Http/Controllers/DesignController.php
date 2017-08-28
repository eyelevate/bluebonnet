<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Design $design)
    {
        $columns = $design->prepareTableColumns();
        $rows = $design->prepareTableRows($design->all());
        return view('designs.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
        'name' => 'required|string|max:255'
        ]);

        flash('Successfully created a Design!')->success();
        Design::create(request()->all());
        return redirect()->route('design.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        return view('designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        if ($design->update($request->all())) {
            flash('You have successfully edited '.$design->name)->success();
            return redirect()->route('design.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
        $design_name = $design->name;
        if ($design->delete()) {
            flash('You have successfully deleted '.$design_name)->success();
            return redirect()->back();
        }
    }
}
