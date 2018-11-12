<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {

        if (\Auth::user()->profile) {
        }
        else {
            $profile = new \App\Profile;
            $profile->user_id = \Auth::id();
            $profile->save();
        }

        return view('profiles.edit');
    }

    public function update(Request $request) {
        $profile = \Auth::user()->profile;
        $profile->favorite_color = $request->input('favorite_color');
        $profile->save();
        $request->session()->flash('status', "Your profile was updated!");
        return redirect()->route('home');
    }
}
