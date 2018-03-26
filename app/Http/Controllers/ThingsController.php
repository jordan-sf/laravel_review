<?php

namespace App\Http\Controllers;

use App\Thing;
use App\USState;
use Illuminate\Http\Request;

class ThingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $things = Thing::all()->sortByDesc('rating');
        return view('things.index', compact('things'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = USState::all();
        $request = request();
        return view('things.create', compact('states', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate(
        [
            'name'       => 'required|min:5|max:60|unique:things',
            'city'       => 'required',
            'state'      => 'required|exists:u_s_states,abbr',
            'date_start' => 'required|date',
            'date_end'   => 'required|date|after:start_date',
        ]);
        $thing = Thing::create($input);

        
        return redirect(route('things.show', $thing))->with('status', 'Thing created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function show(Thing $thing)
    {
        return view('things.show', compact('thing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function edit(Thing $thing)
    {
//        return redirect('/')->with('status', 'Not implemented');
        return view('layouts.app')->with('status', 'Not implemented.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thing $thing)
    {
        return view('layouts.app')->with('status', 'Not implemented.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thing $thing)
    {
        return view('layouts.app')->with('status', 'Not implemented.');
    }
}
