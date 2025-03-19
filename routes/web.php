<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});
Route::get('/tos', function () {
    return view('tos');
});
