<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;

class UserController extends Controller
{

    public function profile()
    {
        return view('partials/profile', array('user'=>Auth::user()));
    }   

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('partials/profile', array('user' => Auth::user()) );
    }

    public function index(User $user)
    {
        $users = User::all();
        return view('layouts/temp_main', compact('users'));
    }
}
