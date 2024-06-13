<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;

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

Route::prefix('/register')->group(function () {
    Route::get('/', function() { return view('User.register');})->name('register');
    Route::post('/', [accountController::class, 'register'])->name('post-register');
});

Route::get('/login', function(){
    return view('User.login');
})->name('login');

Route::get('/forgot-password', function(){
    return view('User.forgotPassword');;
})->name('forgot-password');
