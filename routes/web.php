<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia('Home');
})->name('home');

Route::inertia('/about', 'About', ['user' => 'John'])->name('about');
