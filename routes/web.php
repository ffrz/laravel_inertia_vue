<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(2);
    return inertia('Home');
});

Route::inertia('/about', 'About', ['user' => 'John']);
