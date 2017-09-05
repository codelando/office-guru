<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = \App\Location::paginate(8);
        return view('home')
            ->with('body_class', 'page-home')
            ->with('locations', $locations);
    }

    public function faq()
    {
        $locations = \App\Location::paginate(4);
        return view('faq')
            ->with('body_class', 'faq')
            ->with('locations', $locations);
    }


}
