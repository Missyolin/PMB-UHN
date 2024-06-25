<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

// Route for user login
Route::get('/', function() {return view('User.login');})->name('login')->middleware('guest');
Route::post('/', [accountController::class, 'login'])->name('post-login');

// Route for user registration
Route::prefix('/register')->group(function () {
    Route::get('/', function() {return view('User.register');})->name('register')->middleware('guest');
    Route::post('/', [accountController::class, 'register'])->name('post-register');
});
    
// Route for Logout
Route::get('/logout', function () {
    Auth::logout(); // Melakukan logout pengguna
    return redirect()->route('login'); // Mengarahkan kembali ke halaman login
})->name('logout')->middleware('auth');

// Route for forgot password
Route::get('/forgot-password', function(){return view('User.forgotPassword');})->name('forgot-password')->middleware('guest');
    
Route::middleware(['web','auth'])->group(function() {
    
    // USER
    Route::get('/dashboard-pmb', [UserController::class, 'getDashboardPMB'])->name('dashboard');
    Route::get('/pembelian-formulir', function() { return view('User.payment');})->name('pembelian-formulir');
    Route::get('/formulir-pmb/{id_ujian}', [UserController::class, 'getFormulir'])
    ->name('formulir-pmb')
    ->middleware('check.registration');

    Route::post('/simpan-formulir-pmb', [UserController::class, 'simpanFormulir'])->name('save-formulir-pmb');
    Route::get('/konfirmasi-formulir', function() { return view('User.konfirmasi');})->name('konfirmasi-formulir');

    // ADMIN
    Route::middleware(['admin'])->group(function() {
        Route::get('/dashboard-admin-pmb', function() { return view('Admin.dashboard');})->name('dashboard-admin');

        // WELCOME TO MANAJEMEN PMB

        // TAHUN AJARAN
        Route::get('/manajemen-pmb-tahun-ajaran', [AdminController::class, 'getTahunAjaranPage'])->name('manajemenpmb-admin');            
        Route::post('/manajemen-pmb-tambah-tahunAjaran', [AdminController::class, 'addTahunAjaran'])->name('add-tahun-ajaran');            
        
        // KELOLA UJIAN PMB
        Route::get('/manajemen-pmb-kelola-ujian', [AdminController::class, 'getKelolaUjianPage'])->name('kelola-ujian');
        Route::post('/manajemen-pmb-tambah-ujian', [AdminController::class, 'addUjian'])->name('add-ujian');
        Route::post('/manajemen-pmb-update-ujian/{id}', [AdminController::class, 'updateUjian'])->name('update-ujian');
        Route::post('manajemen-pmb-buka-pendaftaran/{id}', [AdminController::class, 'bukaPendaftaran'])->name('buka-ujian');
        Route::post('manajemen-pmb-tutup-pendaftaran/{id}', [AdminController::class, 'tutupPendaftaran'])->name('tutup-ujian');
        Route::post('manajemen-pmb-tampilkan-ujian/{id}', [AdminController::class, 'tampilkanUjian'])->name('tampilkan-ujian');
        Route::post('manajemen-pmb-sembunyikan-ujian/{id}', [AdminController::class, 'sembunyikanUjian'])->name('sembunyikan-ujian');
        Route::delete('manajemen-pmb-hapus-ujian/{id}', [AdminController::class, 'hapusUjian'])->name('hapus-ujian');

        Route::get('/manajemen-pmb-konfirmasi-peserta-pmb/{id}', [AdminController::class, 'getKelolaPeserta'])->name('konfirmasi-admin');            
    });
});