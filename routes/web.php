<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/tabungan', function () {
    return view('tabungan', ['title' => 'Buku Tabungan']);
});

Route::get('/register', function () {
    return view('user_registration/registration');
});
