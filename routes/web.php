<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin')->middleware('userAccess:admin');
    Route::get('/manajer', [UserController::class, 'index'])->name('manajer')->middleware('userAccess:manajer');
    Route::get('/pegawai', [UserController::class, 'index'])->name('pegawai')->middleware('userAccess:pegawai');
    Route::get('/logout', [LoginController::class, 'logout']);
});
