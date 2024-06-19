<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;
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
    
        // Route for redirect to dashboard
        Route::get('/dashboard-pmb', function() { return view('User.dashboard');})->name('dashboard');
        Route::get('/formulir-pmb', function() { return view('User.formulir');})->name('formulir-pmb');
        Route::get('/konfirmasi-formulir', function() { return view('User.konfirmasi');})->name('konfirmasi-formulir');
        Route::get('/pembelian-formulir', function() { return view('User.payment');})->name('pembelian-formulir');
});