<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\JenisUjian;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;

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

    public function getFormulir($id)
    {
        Carbon::setLocale('id'); 
        
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $tahun_ajaran = TahunAjaran::with('jenisUjian')->get();

        // Filter jenis ujian berdasarkan ID
        $selectedUjian = null;
        foreach ($tahun_ajaran as $tahun) {
            foreach ($tahun->jenisUjian as $ujian) {
                if ($ujian->id_jenis_ujian == $id) {
                    $selectedUjian = $ujian;
                    $selectedUjian->tanggal_buka_pendaftaran_formatted = Carbon::parse($ujian->tanggal_buka_pendaftaran)->translatedFormat('j F Y');
                    $selectedUjian->tanggal_tutup_pendaftaran_formatted = Carbon::parse($ujian->tanggal_tutup_pendaftaran)->translatedFormat('j F Y');
                    break 2;
                }
            }
        }

        if (!$selectedUjian) {
            abort(404, 'Ujian tidak ditemukan');
        }

        return view('User.formulir', compact('provinces', 'regencies', 'districts', 'selectedUjian', 'tahun_ajaran'));
    }

    public function submitFormulir(Request $request)
    {
        
    }

}
