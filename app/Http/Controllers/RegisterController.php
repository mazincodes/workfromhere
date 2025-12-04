<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(): View {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // create user
        $user = User::create($validatedData);

        return redirect()->route('login')->with('success', 'You are registered and can log in');
    }

}
