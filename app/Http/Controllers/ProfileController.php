<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse {
        // get logged in user
        $user = Auth::user();

        // validate data
        $ValidatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        // get user name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        if($user->avatar){
            // delete old avatar if exists
            Storage::delete('public/avatars/' . $user->avatar);
        }
        
        // handle avatar upload
        if($request->hasFile('avatar')){
            
            // store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        // update user info
        $user->save();


        return redirect()->route('dashboard')->with('success', 'User profile info has been updated');
    }
    
}
