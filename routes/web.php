<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TempatMagangController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/
// Autentikasi (login, register, logout, dll)
Auth::routes();


// Halaman utama: welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Setelah login, masuk ke dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Redirect /home ke dashboard
Route::get('/home', fn() => redirect()->route('dashboard'));
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');


// CRUD Mahasiswa dan Tempat Magang
Route::middleware(['auth'])->group(function () {
    Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);
    Route::resource('tempat-magang', App\Http\Controllers\TempatMagangController::class);
});
