<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});


// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


// Halaman yang membutuhkan login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('skema', SkemaSertifikasiController::class)
        ->except(['show']);

    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);

    Route::get('/', [HomeController::class, 'index'])
    ->name('home');
});