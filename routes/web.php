<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/sigin');
});

Route::get('/sigup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/check_credentials', [AuthController::class, 'login'])->name('check_credentials');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::resource('student', StudentController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
