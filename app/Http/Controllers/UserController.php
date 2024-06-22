<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\JenisUjian;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function getDashboardPMB()
    {
        Carbon::setLocale('id');

        $tahun_ajaran = TahunAjaran::with(['jenisUjian' => function($query) {
            $query->orderBy('flag_is_ujian_opened', 'desc');
        }])->get();

        // Memformat tanggal menggunakan Carbon
        foreach ($tahun_ajaran as $tahun) {
            foreach ($tahun->jenisUjian as $ujian) {
                $ujian->tanggal_buka_pendaftaran_formatted = Carbon::parse($ujian->tanggal_buka_pendaftaran)->translatedFormat('j F Y');
                $ujian->tanggal_tutup_pendaftaran_formatted = Carbon::parse($ujian->tanggal_tutup_pendaftaran)->translatedFormat('j F Y');
            }
        }

        return view('User.dashboard', [
            'tahun_ajaran' => $tahun_ajaran,
        ]);
    }
}
