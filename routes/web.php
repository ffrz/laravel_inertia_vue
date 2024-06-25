<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        return inertia('Dashboard', [
            'users' => User::when(
                $request->search,
                function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                    $query->orWhere('email', 'like', '%' . $request->search . '%');
                }
            )->paginate(5, ['id', 'name', 'email', 'created_at'])->withQueryString(),
            'search' => $request->search,
            'acl' => ['can_delete_user' => Auth::user()->can('delete', User::class) ]
        ]);
    })->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register', [])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login', [])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
