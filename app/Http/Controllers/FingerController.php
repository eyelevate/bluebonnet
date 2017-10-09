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
    public function index(Finger $finger)
    {
        $columns = $finger->prepareTableColumns();
        $rows = $finger->prepareTableRows($finger->orderBy('size','asc')->get());
        return view('fingers.index', compact(['columns','rows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fingers.create');
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
             'size' => 'required|numeric',
             'name' => 'required|string'
        ]);
        flash('Successfully created a Finger Size!')->success();
        Finger::create(request()->all());
        return redirect()->route('finger.index');
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
         return view('fingers.edit', compact('finger'));
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
        $this->validate(request(), [
            'size' => 'required|numeric',
             'name' => 'required|string'
        ]);

        if ($finger->update($request->all())) {
            flash('You have successfully edited '.$finger->size)->success();
            return redirect()->route('finger.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finger $finger)
    {
         $fingerSize = $finger->size;
        if ($finger->delete()) {
            flash('You have successfully deleted '.$fingerSize)->success();
            return redirect()->back();
        }
    }
    
}
