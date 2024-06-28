<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PasswordResetToken;
use App\Mail\ResetPasswordMail;


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
