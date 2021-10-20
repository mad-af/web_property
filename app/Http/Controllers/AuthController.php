<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helper\Commons;

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

    public function listUserView () {
        if (Auth::user()->role != 3) {return back();}

        $query = User::get()->toArray();
        $data = [ 'data' => $query ];
        
        return view('adminPage.user', $data);
    }

    public function addUserAdminView () {
        if (Auth::user()->role != 3) {return back();}
        $data = [
            'role' => Commons::USER_ROLE
        ];
        return view('adminPage.userAdd', $data);
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

        return back()->withErrors('Email atau password anda salah.');
    }

    public function authRegisterAction (Request $req) {
        $payload = $req->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'unique:users'],
            'username' => ['required', 'unique:users'],
            'password' => ['nullable', 'min:8'],
            'passwordValidation' => ['nullable', 'min:8'],
            'role' => ['nullable']
        ],
        [
            'email.unique' => 'Email telah digunakan!',
            'username.unique' => 'Username telah digunakan!',
            'password.min' => 'Password anda kurang dari 8 huruf',
            'passwordValidation.min' => 'Password anda kurang dari 8 huruf',
        ]);


        if (!empty($payload['password']) && $payload['password'] != $payload['passwordValidation']) {
            return back()->withErrors('Password tidak sama');
        }

        $password = 'admin'.date('y');
        
        $additional = [
            'password' => Hash::make($payload['password'] ?? $password) ,
            'role' => $payload['role'] ?? 1
        ];
        
        $data = array_merge($payload, $additional);
        
        try {
            User::create($data);
        } catch (\Throwable $th) {
            return back()->withErrors($th);  
        }

        $path = Auth::check() ? '/admin/user' : '/login';
        return redirect($path)->withSuccess('Akun anda berhasil dibuat');
    }

    public function authForgotPasswordAction(Request $req){
        // dd($req->email);
        $user = User::whereEmail($req->email)->first();
        if ($user == null) {
            # code...
            return redirect()->back();
        }
        $details = [
            'title' => 'Password Reset',
            'body' => 'This is using GGL'
        ];
        \Mail::to($user)->send(new \App\Mail\MailSys($details));
        dd($details);
    }

    public function authLogoutAction (Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
}
