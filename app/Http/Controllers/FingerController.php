<?php

namespace App\Http\Controllers;

use App\Finger;
use Illuminate\Http\Request;

class FingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fingers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fingers.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function show(Finger $finger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function edit(Finger $finger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finger $finger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finger $finger)
    {
        //
    }
}
