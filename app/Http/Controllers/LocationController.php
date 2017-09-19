<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$locations = Location::latest()->get();
        $locations = Location::paginate(12);
        return view('location.index')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $body_class = 'page-register menu-inverse';

        return view('location.create', compact('body_class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        /*
        $location = new Location;

        $location->name = request('name');   
        $location->description = request('description');   
        $location->address = request('address');

        $location->save();
        */

        Location::create([
            'name' => request('name'),   
            'description' => request('description'),   
            'address' => request('address'),
            'latitude' => -34.629177,
            'longitude' => -58.417593,
            'image' => '',
            'website' => '',
        ]);

        return redirect('/');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $googleAppKey = env('GOOGLE_APP_KEY', '');
        
        return view('location.show', compact('location', 'googleAppKey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }

    public function markers(Request $request) {
        $latitude = request()->latitude;
        $longitude = request()->longitude;
        $radius = request()->radius;

        $locations =  new Location;
        $locations = $locations->markers($latitude, $longitude, $radius);

        return response()->json($locations);
    }
}
