<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\JenisUjian;
use Illuminate\Support\Facades\Auth;

class PaymentForm
{
    public function handle(Request $request, Closure $next)
    {
        $id_ujian = $request->route('id_ujian');

        //Periksa apakah method ujian Bebas Testing atau Testing
        $examMethod = JenisUjian::where('id_jenis_ujian', $id_ujian)
        ->where('metode_ujian', 'Testing')->exists();

        if ($examMethod){
            return redirect()->route('payment-form', ['id_ujian'=>$id_ujian]);
        }
        return $next($request);
    }
}
