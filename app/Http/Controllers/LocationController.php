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

    public function markers(Request $request) {
        $latitude = request()->latitude;
        $longitude = request()->longitude;
        $radius = request()->radius;

        $locations =  new \App\Location;
        $locations = $locations->markers($latitude, $longitude, $radius);

        // Start XML file, create parent node
        $dom = new \DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);

        header("Content-type: text/xml");
        // Iterate through the rows, adding XML nodes for each
        foreach ($locations as $location) {
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);
            $newnode->setAttribute("id", $location->id);
            $newnode->setAttribute("name", $location->name);
            $newnode->setAttribute("address", $location->address);
            $newnode->setAttribute("lat", $location->latitude);
            $newnode->setAttribute("lng", $location->longitude);
            $newnode->setAttribute("distance", $location->distance);
        }
        echo $dom->saveXML();

    }
}
