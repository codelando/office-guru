<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
    	$sessionUserId = Auth::user()->id;
    	$user =  \App\User::find($sessionUserId);

        return view('user.profile')->with('user', $user);
    }

    /**
     * @todo CRUD
     * @todo Todos las acciones requieren al usuario logeado
     */
}
