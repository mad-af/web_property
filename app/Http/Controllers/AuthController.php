<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    // VIEW
    public function authLoginView () {
        return view('authPage.login');
    }
    public function authRegisterView () {
        return view('authPage.register');
    }
    public function authForgotPasswordView () {
        return view('authPage.forgotPassword');
    }

    // ACTION
    public function authLoginAction (Request $req) {
        $payload = $req->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($payload)) {
            $req->session()->regenerate();
            if(in_array(Auth::user()->role, [2, 3])) {
                return redirect()->intended('/admin/property');
            }
            else if(Auth::user()->role == 1) {
                return redirect()->intended('/user/property');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function authRegisterAction (Request $req) {
        $payload = $req->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'unique:users'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
            'role' => ['nullable']
        ]);
        
        $additional = [
            'password' => Hash::make($payload['password']),
            'role' => $payload['role'] ?? 1
        ];

        $data = array_merge($payload, $additional);

        try {
            User::create($data);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);  
        }
        return redirect('/login');
    }

    public function authLogoutAction (Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
}
