<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;



// HALAMAN PESERTA - PUBLIC
Route::get('/', [HomeController::class, 'index'])->name('home');


// LOGIN ADMIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');



// HALAMAN ADMIN
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);

    Route::resource('skema', SkemaSertifikasiController::class)
        ->except(['show']);

});