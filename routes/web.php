<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'authLoginView']);
    Route::get('/register', [AuthController::class, 'authRegisterView']);
    Route::get('/forgot-password', [AuthController::class, 'authForgotPasswordView']);
    Route::post('/login', [AuthController::class, 'authLoginAction']);
    Route::post('/register', [AuthController::class, 'authRegisterAction']);
    Route::post('/logout', [AuthController::class, 'authLogoutAction'])->withoutMiddleware(['guest']);
});

// web-page
Route::get('/', function () {
    return view('webPage.index');
});
Route::get('/property', function () {   
    return view('webPage.property');
});
Route::get('/find-home', function () {
    return view('webPage.FindHome');
});
Route::get('/about-us', function () {
    return view('webPage.aboutUs');
});

// admin-page
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/property', function () {
        return view('adminPage.property');
    });
    Route::get('/admin/user', function () {
        return view('adminPage.user');
    });
    Route::get('/admin/order', function () {
        return view('adminPage.order');
    });
});
