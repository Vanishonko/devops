<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $remember = $request->has('remember');

        // Log the user in
        Auth::login($user, $remember);

        // Redirect to the notes index page
        return redirect()->route('notes.index');
    }
}
