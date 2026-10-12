
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;

// HALAMAN LOGIN DAN REGISTER
// Hanya bisa dibuka oleh pengguna yang belum login
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');
});

// HALAMAN YANG MEMERLUKAN LOGIN
Route::middleware('auth')->group(function () {

    // DASHBOARD PESERTA
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // HALAMAN KHUSUS ADMIN
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // CRUD PESERTA
        Route::resource('peserta', PesertaController::class)
            ->parameters(['peserta' => 'peserta']);

        // CRUD SKEMA SERTIFIKASI
        Route::resource('skema', SkemaSertifikasiController::class)
            ->except(['show']);
    });
});
