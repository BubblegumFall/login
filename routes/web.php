<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;



Route::get('/', [LoginController::class,'index']);
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
});

// Route::prefix('admin')->group(function () {
//     Route::get('/admin', [AdminController::class, 'index']);
//     Route::get('/users', [AdminController::class, 'users']);
// });

// Route::prefix('users')->group(function () {
//     Route::get('/index', [UsersController::class, 'index']);
//     Route::get('/create', [UsersController::class, 'create']);
// });



