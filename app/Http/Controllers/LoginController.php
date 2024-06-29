<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        // (you'll need to replace 'email' with the actual field you're using for usernames)
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('notes.index');
        }

        // If login was not successful, redirect back to the login form with an error message
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
