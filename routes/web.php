<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/tabungan', function () {
    return view('tabungan', ['title' => 'Buku Tabungan']);
});
