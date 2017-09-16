<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Show office list.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
    	$locations = \App\Location::paginate(12);
        return view('location.list')->with('locations', $locations);
    }

    public function detail(Location $location) {
        $googleAppKey = env('GOOGLE_APP_KEY', '');
        
        return view('location.detail', compact('location', 'googleAppKey'));
    }

    public function markers(Request $request) {
        $latitude = request()->latitude;
        $longitude = request()->longitude;
        $radius = request()->radius;

        $locations =  new \App\Location;
        $locations = $locations->markers($latitude, $longitude, $radius);

        return response()->json($locations);
    }
}
