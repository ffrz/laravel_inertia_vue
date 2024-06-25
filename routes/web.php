<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home')->name('home');
Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard', ['users' => User::paginate(5, ['id', 'name', 'email', 'created_at'])])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register', [])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login', [])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
