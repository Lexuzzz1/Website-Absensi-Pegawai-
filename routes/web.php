<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAccess;



Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin')->middleware('userAccess:admin');
    Route::get('/manajer', [UserController::class, 'index'])->name('manajer')->middleware('userAccess:manajer');
    Route::get('/pegawai', [UserController::class, 'index'])->name('pegawai')->middleware('userAccess:pegawai');
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/generate-qrcode', [QRCodeController::class, 'showForm'])->name('qr.form');
    Route::post('/generate-qrcode', [QRCodeController::class, 'generate'])->name('qrcode.generate');    
});

// Route untuk menampilkan daftar absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

// Route untuk menyimpan data absensi manual
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');

// Route untuk scan QR Code
Route::get('/scan', [QRCodeController::class, 'scan'])->name('absensi.scan');

// Route untuk generate QR Code
Route::post('/generate/qr', [QRCodeController::class, 'generateQRCode'])->name('qrCode.generateQRCode');

// Route untuk presensi melalui QR Code
Route::get('/presensi', [AbsensiController::class, 'presensi'])->name('absensi.presensi');

//route untuk melakukan scanner qe code
Route::get('/qr-scanner', function () {
    return view('qr.scanner');
});
