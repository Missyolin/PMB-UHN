<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PasswordResetToken;
use App\Mail\ResetPasswordMail;
use App\Mail\VerifyRegistration;


class accountController extends Controller
{
    public function register(Request $request)
    {
        
        $customMessage = [
            'username.required' => 'username tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'email.exists' => 'Email sudah terdaftar',
            'password.min' => 'Password minimim 6 karakter',
        ];
        // Validasi input pengguna
        $request->validate([
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',
        ], $customMessage);
        
        // Hash password sebelum menyimpannya
        $username = $request->get('username');
        $email = $request->get('email');
        $password = bcrypt($request->get('password'));
        $token = \Str::random(60);


        // Membuat akun baru dengan password yang sudah di-hash
        $user = User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'remember_token' => $token,
        ]);

        // Mengirim email verifikasi
        Mail::to($request->email)->send(new VerifyRegistration($token));

        return view('auth.registrationAnnouncement')->with('success', 'Silakan periksa email Anda untuk verifikasi.');
    }

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->firstOrFail();

        // Tandai email sebagai terverifikasi
        $user->email_verified_at = now();
        $user->remember_token = null; // Hapus token setelah digunakan
        $user->save();

        return redirect()->route('login')->with('success', 'Email Anda telah diverifikasi. Silakan login.');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                if ($user->role === 'user' && $user->email_verified_at === null) {
                    return redirect()->route('login')->with('error', 'Email Anda belum diverifikasi. Silakan periksa email Anda untuk verifikasi.');
                }

                if (Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    if ($user->username === 'Admin') {
                        return redirect()->route('dashboard-admin');
                    } else {
                        return redirect()->route('dashboard');
                    }
                }
            }

            return redirect()->route('login')->with('error', 'Kredensial tidak tepat!');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    public function logout()
    {
        return redirect()->route('login');
    }

    public function forgotPasswordAct(Request $request)
    {
        $customMessage = [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ];

        $request->validate([
            'email'=>'required|email|exists:users,email'
        ], $customMessage);

        $token = \Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email,
            ],
            [

            'email' => $request->email,
            'token' => $token,
            'created_at'  => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return view('auth.verify')->with('success');
    }

    public function forgotPasswordValidation(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if(!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }
        return view('auth.resetPassword', compact('token'));
    }

    public function forgotPasswordValidationAct(Request $request)
    {
        $customMessage = [
            'newPassword.required' => 'Password tidak boleh kosong',
        ];

        $request->validate([
            'newPassword' => 'required'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if(!$token)
        {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }
        $user = User::where('email', $token->email)->first();
        
        if(!$user){
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar');
        }

        $user->update([
            'password' => Hash::make($request->newPassword)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password berhasil diubah');
    }


}
