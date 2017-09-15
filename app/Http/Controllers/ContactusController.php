<?php

namespace App\Http\Controllers;

use App\Contactus;
use App\Job;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Job $job)
    {
        $theme = 2;
        $this->layout = $job->switchLayout($theme);
        $this->layout = $job->switchLayout($theme);
    }
    
    public function index()
    {
        $layout = $this->layout;

        return view('contact.index', compact(['layout']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create', compact(['layout']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contactus $contactus, Job $job)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $phone = $job->stripAllButNumbers($request->phone);
        $request->request->add(['status' => 1]);
        $request->merge(['phone'=>$phone]);
        $contactus->create(request()->all());
        flash('Successfully created a Message! We will contact you as soon as possible ')->success();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function show(Contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactus $contactus)
    {
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactus $contactus)
    {
        $this->validate(request(), [
            'size' => 'required|numeric'
        ]);

        if ($size->update($request->all())) {
            flash('You have successfully edited '.$size->size)->success();
            return redirect()->route('size.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactus $contactus)
    {
        $size_name = $size->size;
        if ($size->delete()) {
            flash('You have successfully deleted '.$size_name)->success();
            return redirect()->back();
        }
    }

    public function markAsRead(Request $request, Contactus $contactus)
    {
        $contactus->status=2;
        $contactus->save();
        $contact_get = Contactus::prepareContactus();
        return response()->json([
            'status' => true,
            'set' => $contact_get
        ]);
        
    }

    public function setAsArchive(Request $request, Contactus $contactus)
    {
        $contactus->status=3;
        $contactus->save();
        $contact_get = Contactus::prepareContactus();
        return response()->json([
            'status' => true,
            'set' => $contact_get
        ]);

    }

    public function setAsDeleted(Request $request, Contactus $contactus)
    {
        $contactus->delete();
        $contact_get = Contactus::prepareContactus();
        return response()->json([
            'status' => true,
            'set' => $contact_get
        ]);
    }

}
