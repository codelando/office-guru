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
}
