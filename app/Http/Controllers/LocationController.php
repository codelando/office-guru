<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Show office list.
     *
     * @return \Illuminate\Http\Response
     */
    public function search() {
    	$locations = \App\Location::paginate(12);
        return view('location.list')->with('locations', $locations);
    }

	/**
     * Show office list.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id) {
    	$location = \App\Location::find($id);
        $googleAppKey = env('GOOGLE_APP_KEY', '');
        
        return view('location.detail')
            ->with('location', $location)
            ->with('googleAppKey', $googleAppKey);
    }
}
