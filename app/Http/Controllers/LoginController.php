<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    // public function login(StoreLoginRequest $request)
    // {
    //     $credentials = $request->validated();

    //     if (Auth::attempt(['username' => $credentials['username'], 'email' => $credentials['email'] , 'password' => $credentials['password']])) {  
    //         $request->session()->regenerate();
    //         return redirect()->intended('/users');
    //     }

    //     return back()->withErrors([
    //         'username' => 'De ingevoerde gebruikersnaam of het wachtwoord is onjuist.',
    //     ])->onlyInput('username');
    // }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users');
    }
}
