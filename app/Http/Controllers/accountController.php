<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $credentials = User::where('email', $request->email)->first();

            if ($credentials && Hash::check($request->password, $credentials->password)) {
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                if (Auth::user()->username === 'Admin') {
                    return redirect()->route('dashboard-admin');
                } else {
                    return redirect()->route('dashboard');
                }
            }

            return redirect()->route('login')->with('error', 'Kredensial tidak tepat!');
        } catch (ErrorException $e) {
            return redirect()->route('login')->with('error', 'Kredensial tidak tepat!');
        }
    }

    public function logout()
    {
        return redirect()->route('login');
    }


}
