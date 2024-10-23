<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

// Route::get('/home', function(){
//     return redirect('/admin');
// });

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('userAccess:admin');
    Route::get('/manajer', [ManajerController::class, 'index'])->name('manajer')->middleware('userAccess:manajer');
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('userAccess:pegawai');
    Route::get('/logout', [LoginController::class, 'logout']);
});
