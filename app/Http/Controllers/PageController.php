<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $locations = \App\Location::paginate(6);
        return view('page.home')
            ->with('body_class', 'page-home')
            ->with('locations', $locations);
    }

    public function faq()
    {
        $body_class = 'faq';
        $locations = \App\Location::paginate(6);
        
        return view('page.faq', compact('body_class', 'locations'));
    }
}
