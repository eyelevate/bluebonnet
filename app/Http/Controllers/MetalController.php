<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255'
        ]);

        flash('Successfully created a Metal!')->success();
        $service->create(request()->all());
        return redirect()->route('service.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metal  $metal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metal $metal)
    {
        //
    }
}
