<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/tabungan', function () {
    return view('tabungan', ['title' => 'Buku Tabungan']);
});

//Location
// Route::get('/getCitiesByProvince/{code}', [LocationController::class, 'getCitiesByProvince'])
//     ->name('getCitiesByProvince');
// Route::get('/getVillagesByDistrict/{code}', [LocationController::class, 'getVillagesByDistrict'])
//     ->name('getVillagesByDistrict');
// Route::get('/getDistrictsByCity/{code}', [LocationController::class, 'getDistrictsByCity'])
//     ->name('getDistrictsByCity');

// Route Group untuk Location
Route::prefix('location')->name('location.')->group(function () {
    // Rute untuk mendapatkan kota berdasarkan provinsi
    Route::get('/cities/{code}', [LocationController::class, 'getCitiesByProvince'])->name('cities');
    // Rute untuk mendapatkan desa berdasarkan distrik
    Route::get('/villages/{code}', [LocationController::class, 'getVillagesByDistrict'])->name('villages');
    // Rute untuk mendapatkan distrik berdasarkan kota
    Route::get('/districts/{code}', [LocationController::class, 'getDistrictsByCity'])->name('districts');
});

// End Location


Route::get('/register', [UserController::class, 'register'])->name('register.register');
Route::post('/register', [UserController::class, 'store_register'])->name('register.store_register');
Route::get('/activation/{code}', [UserController::class, 'activation'])->name('activation.activation');
Route::post('/activation/store_activation', [UserController::class, 'store_activation'])->name('activation.store_activation');
Route::get('/create-account/{code}', [UserController::class, 'create'])->name('create-account.create');
Route::post('/create-account', [UserController::class, 'store'])->name('create-account.store');

Route::get('/aktivasi', function () {
    return view('user_registration/activation');
});

// Route::get('/login', function () {
//     return view('auth/login');
// });

// Menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Menangani proses login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Menangani logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('pages/dashboard', ['title' => 'Dashboard']);
});
