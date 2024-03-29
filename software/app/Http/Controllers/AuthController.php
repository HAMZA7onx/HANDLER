<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

/* to handle email */
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|min:5|max:200'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if(request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }
        $newUser = User::create($validated);

        Mail::to($newUser->email)->send(new WelcomeEmail($newUser));

        return redirect()->route('dashboard')->with('success', 'Rigister Has been successfully');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate() {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found the provided email and password'
        ]);
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}
