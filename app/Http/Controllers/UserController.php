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

    public function update(Request $request)
    {
        $this-> validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'image' => 'mimes:jpeg,jpg,png|max:5120', // 5Mb
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        
        /** @todo esto debe ser una variable de entorno */
        $folder = "public/user/image";
        $path = $request->file("image")->storePublicly($folder);

        $user->image = $request->image->hashName();
        $user->email = $request->email;

        $user->save();

        return view('user.profile')->with('user', $user);
    }
}

