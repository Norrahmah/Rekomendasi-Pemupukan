<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->level === 'petani') {
                return redirect('/');
            } else {
                return redirect('/dashboard');
            }
        }

        return redirect('login')->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
