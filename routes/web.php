<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/meals/add', function () {
    return view('meals.add');
})->middleware(['auth'])->name('meals.add');
require __DIR__.'/auth.php';
