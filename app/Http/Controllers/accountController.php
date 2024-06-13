<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class accountController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        // Hash password sebelum menyimpannya
        $username = $request->get('username');
        $email = $request->get('email');
        $password = bcrypt($request->get('password'));

        // Membuat akun baru dengan password yang sudah di-hash
        $account = User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);

        return view('User.login');
    }

}
