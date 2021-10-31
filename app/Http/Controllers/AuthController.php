<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helper\Commons;
use App\Mail\AdminMakeUser;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Auth\Events\PasswordReset;

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

    public function resetView($token){
        $check = PasswordReset::where('token', $token)->get();
        if(count($check) > 0){
            // dd($check[0]['email']);
            return response()->view('authPage/resetView', ['email'=>$check[0]['email'], 'token'=>$token]);
        }else dd('Sorry, your token is incorrect or might be expired. Please try to make a new mail request.');
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
        // dd($req['email']);
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
        
        $personalMsg = [
            'fromAdmin' => 1,
            'username' => $req['username'],
            'password' => $password
        ];

        try {
            Mail::to($req['email'])->send(new AdminMakeUser($personalMsg));
            User::create($data);
            // return back();  
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
        $token = md5(base64_encode(base64_encode(base64_encode(date('YmdHis')))));
        $details = [
            'title' => 'Password Reset',
            'token' => $token
        ];
        // dd($user['email']);
        $reset = PasswordReset::insert(['email'=>$user['email'], 'token'=>$token, 'created_at'=>Carbon::now()->toDateTimeString()]);
        // dd($reset);
        Mail::to($user)->send(new \App\Mail\MailSys($details));
        return redirect()->back();
        // dd($details);
    }

    public function resetPasswordAction(Request $req){
        // dd($req);
        if ($req['password'] != $req['confPassword']) {
            return back()->with(['error'=>'Password tidak sama']);
        }
        // $payload = $req->validate([
        //     'password' => ['nullable', 'min:8'],
        //     'passwordValidation' => ['nullable', 'min:8']
        // ],
        // [
        //     'password.min' => 'Password anda kurang dari 8 huruf',
        //     'passwordValidation.min' => 'Password anda kurang dari 8 huruf',
        // ]);
        $validated = $req->validate([
            'password' => 'required|max:255|min:8',
            'confPassword' => 'required|min:8',
        ],
        [
            'password.min' => 'Password anda kurang dari 8 huruf',
            'confPassword.min' => 'Konfirmasi password anda kurang dari 8 huruf',
        ]);
        $password = Hash::make($req['password']);
        $user = User::where('email', $req['email']);
        $user->update(['password'=>$password]);
        PasswordReset::where('token', $req['token'])->delete();
        return view('authPage/login');
    }

    public function authLogoutAction (Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
}
