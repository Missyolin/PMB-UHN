<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\JenisUjian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function getTahunAjaranPage()
    {
        $tahun_ajaran = TahunAjaran::with('jenisUjian')->get();
        return view('Admin.tahunAjaran', [
            'tahun_ajaran' => $tahun_ajaran,
        ]);
    }

    public function getKelolaUjianPage()
    {
        Carbon::setLocale('id');

        $tahun_ajaran = TahunAjaran::with('jenisUjian')->get();

        foreach ($tahun_ajaran as $tahun) {
            foreach ($tahun->jenisUjian as $ujian) {
                $ujian->tanggal_buka_pendaftaran_formatted = Carbon::parse($ujian->tanggal_buka_pendaftaran)->translatedFormat('j F Y');
                $ujian->tanggal_tutup_pendaftaran_formatted = Carbon::parse($ujian->tanggal_tutup_pendaftaran)->translatedFormat('j F Y');
            }
        }
        return view('Admin.kelolaUjian', [
            'tahun_ajaran' => $tahun_ajaran,
        ]);
    }

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

    public function addUjian(Request $request)
    {
        $request->validate([
            'namaUjian' => 'required|string|max:100',
            'gelombangUjian' => 'required|string|max:20',
            'jenisUjian' => 'required|string|max:50',
            'metodeUjian' => 'required|string|max:50',
            'periodeAwal' => 'required|date',
            'periodeAkhir' => 'required|date|after:periodeAwal', 
            'tanggalPengumuman' => 'required|max:20',
        ]);

        $validator = Validator::make($request->all(), []);

        $validator->after(function ($validator) use ($request) {
            if ($request->input('periodeAwal') >= $request->input('periodeAkhir')) {
                $validator->errors()->add('periodeAwal', 'Periode awal harus sebelum periode akhir.');
                $validator->errors()->add('periodeAkhir', 'Periode akhir harus setelah periode awal.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

            return redirect()->route('kelola-ujian')->with('success', 'Ujian berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['custom_error' => 'Gagal menambahkan ujian. Silakan coba lagi.'])->withInput();
        }
    }

    public function updateUjian(Request $request, $id)
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

        $ujian = JenisUjian::findOrFail($id);
        $ujian->nama_ujian = $request->input('namaUjian');
        $ujian->gelombang_ujian = $request->input('gelombangUjian');
        $ujian->jenis_ujian = $request->input('jenisUjian');
        $ujian->metode_ujian = $request->input('metodeUjian');
        $ujian->tanggal_buka_pendaftaran = Carbon::parse($request->input('periodeAwal'))->format('Y-m-d');
        $ujian->tanggal_tutup_pendaftaran = Carbon::parse($request->input('periodeAkhir'))->format('Y-m-d');
        $ujian->waktu_pengumuman = $request->input('tanggalPengumuman');
        $ujian->save();

        return redirect()->route('kelola-ujian')->with('success', 'Ujian berhasil diperbarui.');
    }

    public function bukaPendaftaran($id)
    {
        $ujian = JenisUjian::findOrFail($id);
        $ujian->flag_is_ujian_opened = true;
        $ujian->flag_is_ujian_hidden = false;
        $ujian->save();

        return redirect()->route('kelola-ujian')->with('success', 'Pendaftaran ujian berhasil dibuka.');
    }

    public function tutupPendaftaran($id)
    {
        $ujian = JenisUjian::findOrFail($id);
        $ujian->flag_is_ujian_opened = false;
        $ujian->save();

        return redirect()->route('kelola-ujian')->with('success', 'Pendaftaran ujian berhasil ditutup.');
    }

    public function tampilkanUjian($id)
    {
        $ujian = JenisUjian::findOrFail($id);
        $ujian->flag_is_ujian_hidden = false;
        $ujian->save();

        return redirect()->route('kelola-ujian')->with('success', 'Ujian berhasil ditampilkan.');
    }

    public function sembunyikanUjian($id)
    {
        $ujian = JenisUjian::findOrFail($id);
        $ujian->flag_is_ujian_hidden = true;
        $ujian->save();

        return redirect()->route('kelola-ujian')->with('success', 'Ujian berhasil disembunyikan.');
    }

    public function hapusUjian(Request $request, $id_jenis_ujian)
    {
        try {
            $ujian = JenisUjian::findOrFail($id_jenis_ujian);
            $ujian->delete();

            return redirect()->route('kelola-ujian')->with('success', 'Ujian berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['custom_error' => 'Gagal menghapus ujian. Silakan coba lagi.']);
        }
    }
}
