<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('register')->with('success', 'Rigister Have been successfully');
    }
}
