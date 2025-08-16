<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        // Logic for handling login
        dd($request->all()); // Debugging line to check request data
        $credentials = $request->only('email', 'password');
        dd($credentials); // Debugging line to check credentials
        if (auth()->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('dashboard');
        }
        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout()
    {
        // Logic for handling logout
    }
}