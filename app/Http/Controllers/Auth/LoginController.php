<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
    // Logic for handling login
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    
        $email = $request->input('email');
        $password = $request->input('password');

    $user = User::where('email', $email)->first();

    if ($user && password_verify($password, $user->password)) {
        
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
            ]);
    
            $request->session()->regenerate();
            
            auth()->login($user);
            return redirect()->route('dashboard')->with('success', 'Login successful!');

        }

    // Authentication failed
    if (!$user) {
        return back()->withErrors([
            'email' => 'The provided email does not match our records.',
        ]);
    } else {
        return back()->withErrors([
            'password' => 'The provided password is incorrect.',
        ]);
    }
}


    public function logout(Request $request)
    {
        // Remove user session data
        $request->session()->forget(['user_id', 'user_name', 'user_email']);
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}