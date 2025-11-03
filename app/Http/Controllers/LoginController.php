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
        return view('auth.login');
    }

    public function login(StoreLoginRequest $request)
    {
        $credentials = $request->validated();
        
        if (Auth::attempt($credentials)) {  
            $request->session()->regenerate();
            return redirect()->intended('/users');
        }

        return back()->withErrors([
            'username' => 'De ingevoerde gebruikersnaam of het wachtwoord is onjuist.',
        ])->onlyInput('username');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users');
    }
}
