<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PendaftaranUjian;

class CheckRegistrationStatus
{
    public function handle($request, Closure $next)
    {
        $userId = auth()->user()->id; // Ambil ID pengguna yang sedang login
        $id_ujian = $request->id_ujian;
        
        // Periksa apakah pengguna sudah mendaftar ujian atau belum
        $userHasRegisteredForExam = PendaftaranUjian::where('id_pendaftar', $userId)
            ->where('id_ujian',$id_ujian)
            ->exists();

        if ($userHasRegisteredForExam) {
            // Jika sudah mendaftar, alihkan pengguna ke halaman konfirmasi ujian atau halaman lain yang sesuai
            return redirect()->route('konfirmasi-formulir');
        }

        // Jika belum mendaftar, lanjutkan permintaan ke tujuan awal
        return $next($request);
    }
}
