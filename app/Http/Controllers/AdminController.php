<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\JenisUjian;

class AdminController extends Controller
{
    public function getManajemenPage()
    {
        $tahun_ajaran = TahunAjaran::all();
        return view('Admin.manajemenpmb', ['tahun_ajaran' => $tahun_ajaran]);
    }

    // TAHUN AJARAN
    public function addTahunAjaran(Request $request)
    {
        $request->validate([
            'tahunMulai' => 'required|integer|digits:4',
            'tahunSelesai' => 'required|integer|digits:4',
        ], [
            'tahunMulai.required' => 'Tahun Mulai harus diisi.',
            'tahunMulai.integer' => 'Tahun Mulai harus berupa angka.',
            'tahunMulai.digits' => 'Tahun Mulai harus terdiri dari :digits digit.',
            'tahunSelesai.required' => 'Tahun Selesai harus diisi.',
            'tahunSelesai.integer' => 'Tahun Selesai harus berupa angka.',
            'tahunSelesai.digits' => 'Tahun Selesai harus terdiri dari :digits digit.',
        ]);

        $tahun_mulai = $request->input('tahunMulai');
        $tahun_selesai = $request->input('tahunSelesai');

        // Validasi custom untuk memastikan tahun_selesai satu tahun lebih besar dari tahun_mulai
        if ($tahun_selesai != $tahun_mulai + 1) {
            return back()->withErrors(['tahunSelesai' => 'Tahun Selesai harus satu tahun lebih besar dari Tahun Mulai'])->withInput();
        }

        // Periksa apakah kombinasi tahun_mulai dan tahun_selesai sudah ada
        if (TahunAjaran::where('tahun_mulai', $tahun_mulai)->where('tahun_selesai', $tahun_selesai)->exists()) {
            return back()->withErrors(['tahunMulai' => 'Kombinasi Tahun Mulai dan Tahun Selesai sudah ada'])->withInput();
        }

        try {
            $tahunBaru = TahunAjaran::create([
                'tahun_mulai' => $tahun_mulai,
                'tahun_selesai' => $tahun_selesai,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['custom_error' => 'Gagal menambahkan tahun ajaran. Silakan coba lagi.'])->withInput();
        }

        return redirect()->route('manajemenpmb-admin')->with('success', 'Tahun Ajaran berhasil ditambahkan.');
    }

    // UJIAN
    public function addUjian(Request $request)
{
    $request->validate([
        'namaUjian' => 'required|string|max:100',
        'gelombangUjian' => 'required|string|max:20',
        'jenisUjian' => 'required|string|max:50',
        'metodeUjian' => 'required|string|max:50',
        'periodeAwal' => 'required|date',
        'periodeAkhir' => 'required|date',
        'tanggalPengumuman' => 'required|max:20',
    ]);

    try {
        $ujian = new JenisUjian;
        $ujian->nama_ujian = $request->input('namaUjian');
        $ujian->gelombang_ujian = $request->input('gelombangUjian');
        $ujian->tahun_ajaran = $request->input('tahunAjaran');
        $ujian->jenis_ujian = $request->input('jenisUjian');
        $ujian->metode_ujian = $request->input('metodeUjian');
        $ujian->tanggal_buka_pendaftaran = $request->input('periodeAwal');
        $ujian->tanggal_tutup_pendaftaran = $request->input('periodeAkhir');
        $ujian->waktu_pengumuman = $request->input('tanggalPengumuman');

        $ujian->save();

        return redirect()->route('manajemenpmb-admin')->with('success', 'Ujian berhasil ditambahkan.');
    } catch (\Exception $e) {
        dd($e->getMessage());
        }
}


    


}
