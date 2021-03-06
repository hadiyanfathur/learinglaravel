<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/login/siswa', [App\Http\Controllers\Auth\LoginController::class, 'showSiswaLoginForm'])->name('loginForm.siswa');
Route::post('/login/siswa', [App\Http\Controllers\Auth\LoginController::class, 'siswaLogin'])->name('login.siswa');
Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/dashboard-siswa', [App\Http\Controllers\SiswaController::class, 'dashboard'])->name('siswa.home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('kelas', App\Http\Controllers\KelasController::class);
    Route::resource('spp', App\Http\Controllers\SppController::class);
    Route::resource('siswa', App\Http\Controllers\SiswaController::class);
    Route::resource('pembayaran', App\Http\Controllers\PembayaranController::class);
    Route::resource('petugas', App\Http\Controllers\UserController::class)->only(['index', 'destroy'])->middleware('can:Administrator');;
});

