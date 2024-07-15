<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PendaftaranUjian;
use Illuminate\Support\Facades\Auth;

class CheckRegistrationStatus
{
    public function handle($request, Closure $next)
    {
        $userId = Auth::id();
        $id_ujian = $request->route('id_ujian');

        // Periksa apakah pengguna sudah mendaftar atau session menandakan sudah mendaftar
        $userHasRegisteredForExam = PendaftaranUjian::where('id_pendaftar', $userId)
            ->where('id_ujian', $id_ujian)
            ->exists() || session()->has('registered_exam') && session()->get('registered_exam') == $id_ujian;

        if ($userHasRegisteredForExam) {
            return redirect()->route('preview-formulir', ['id'=>$id_ujian]);
        }

        return $next($request);
    }
}
