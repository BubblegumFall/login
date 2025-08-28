<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;


Route::get('/template', function () {
    return view('index');
});

Route::get('dashboard', [DashboardController::class,'index']);

Route::get('siswa', [SiswaController::class,'index']);

Route::get('guru', [GuruController::class,'index']);

Route::prefix('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users']);
});

Route::prefix('users')->group(function () {
    Route::get('/index', [UsersController::class, 'index']);
    Route::get('/create', [UsersController::class, 'create']);
});

Route::resource('siswa', SiswaController::class);

Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

