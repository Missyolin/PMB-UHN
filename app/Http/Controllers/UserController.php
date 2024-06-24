<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\JenisUjian;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\DataPribadiPendaftar;
use App\Models\DataSekolahAsalPendaftar;
use App\Models\DataOrangtuaPendaftar;
use App\Models\PendaftaranUjian;
use App\Models\District;

use Illuminate\Support\Facades\Auth;

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
    
    public function simpanFormulir(Request $request)
    {
        // dd($request->all());
        // Validasi input sesuai kebutuhan Anda
        try{

            $validatedData = $request->validate([
                // Data Pribadi
                'namaLengkap' => 'required|string|max:100',
                'nik' => 'required|string|max:16',
                'alamat' => 'required|string|max:100',
                'keterangan' => 'required|string|max:20',
                'provinsi' => 'required|integer',
                'kota_kabupaten' => 'required|integer',
                'kecamatan' => 'required|integer',
                'kelurahan' => 'required|string|max:50',
                'kode_pos' => 'nullable|string|max:6',
                'no_telp' => 'required|string|max:13',
                'jenis_kelamin' => 'required|string',
                'tempat_lahir' => 'required|string|max:50',
                'tanggal_lahir' => 'required|date',
                'kewarganegaraan' => 'required|string|max:50',
                'agama' => 'required|string|max:10',
                'gereja' => 'required|string|max:10',
                'status_sipil' => 'required|string|max:15',
                'npm_1' => 'nullable|string|max:8',
                'npm_2' => 'nullable|string|max:8',
                // Pilihan Program Studi
                'fakultas' => 'required|string|max:30',
                'prodi1' => 'required|string|max:30',
                'prodi2' => 'nullable|string|max:30',
                // Data Asal Sekolah
                'provSekolah' => 'required|integer',
                'kotaSekolah' => 'required|integer',
                'asalSekolah' => 'required|string|max:255',
                'jurusan' => 'required|string|max:15',
                'tahunLulus' => 'required|integer',
                'noIjazah' => 'nullable|string|max:20',
                'tglIjazah' => 'nullable|date',
                'nilaiUan' => 'required|numeric',
                'mapelUan' => 'required|integer',
                // Data Ujian
                'id_ujian' => 'required|integer',
                // Data Orang Tua
                'namaAyah' => 'required|string|max:100',
                'tlAyah' => 'required|date',
                'agamaAyah' => 'required|string|max:10',
                'pendidikanTerakhirAyah' => 'required|string|max:10',
                'pekerjaanAyah' => 'required|string|max:50',
                'penghasilanAyah' => 'required|string|max:50',
                'alamatAyah' => 'required|string|max:255',
                'statusAyah' => 'required|string|max:12',
                'noAyah' => 'required|string|max:15',
                'namaIbu' => 'required|string|max:100',
                'tlIbu' => 'required|date',
                'agamaIbu' => 'required|string|max:10',
                'pendidikanTerakhirIbu' => 'required|string|max:10',
                'pekerjaanIbu' => 'required|string|max:50',
                'penghasilanIbu' => 'required|string|max:50',
                'alamatIbu' => 'required|string|max:255',
                'statusIbu' => 'required|string|max:12',
                'noIbu' => 'required|string|max:15',
                'namaWali' => 'nullable|string|max:100',
                'tlWali' => 'nullable|date',
                'agamaWali' => 'nullable|string|max:10',
                'pendidikanTerakhirWali' => 'nullable|string|max:10',
                'pekerjaanWali' => 'nullable|string|max:50',
                'penghasilanWali' => 'nullable|string|max:50',
                'alamatWali' => 'nullable|string|max:255',
                'noWali' => 'nullable|string|max:15',
            ]);
    
            // Mendapatkan ID user yang sedang login
            $userId = Auth::id();
    
            // Simpan data pribadi pendaftar
            $dataPribadi = new DataPribadiPendaftar();
            $dataPribadi->id_pendaftar = $userId;
            $dataPribadi->nama_lengkap = $validatedData['namaLengkap'];
            $dataPribadi->nik = $validatedData['nik'];
            $dataPribadi->alamat = $validatedData['alamat'];
            $dataPribadi->keterangan_tempat_tinggal = $validatedData['keterangan'];
            $dataPribadi->provinsi = $validatedData['provinsi'];
            $dataPribadi->kota_kabupaten = $validatedData['kota_kabupaten'];
            $dataPribadi->kecamatan = $validatedData['kecamatan'];
            $dataPribadi->kelurahan = $validatedData['kelurahan'];
            $dataPribadi->kode_pos = $validatedData['kode_pos'];
            $dataPribadi->no_telp = $validatedData['no_telp'];
            $dataPribadi->jenis_kelamin = $validatedData['jenis_kelamin'];
            $dataPribadi->tempat_lahir = $validatedData['tempat_lahir'];
            $dataPribadi->tanggal_lahir = $validatedData['tanggal_lahir'];
            $dataPribadi->kewarganegaraan = $validatedData['kewarganegaraan'];
            $dataPribadi->agama = $validatedData['agama'];
            $dataPribadi->gereja = $validatedData['gereja'];
            $dataPribadi->status_sipil = $validatedData['status_sipil'];
            $dataPribadi->npm_1 = $validatedData['npm_1'];
            $dataPribadi->npm_2 = $validatedData['npm_2'];
            $dataPribadi->save();
    
            // Simpan data sekolah asal pendaftar
            $dataSekolah = new DataSekolahAsalPendaftar();
            $dataSekolah->id_pendaftar = $userId;
            $dataSekolah->provinsi_sekolah = $validatedData['provSekolah'];
            $dataSekolah->kota_kabupaten_sekolah = $validatedData['kotaSekolah'];
            $dataSekolah->nama_sekolah = $validatedData['asalSekolah'];
            $dataSekolah->jurusan = $validatedData['jurusan'];
            $dataSekolah->tahun_lulus = $validatedData['tahunLulus'];
            $dataSekolah->no_ijazah = $validatedData['noIjazah'];
            $dataSekolah->tanggal_ijazah = $validatedData['tglIjazah'];
            $dataSekolah->jumlah_nilai_uan = $validatedData['nilaiUan'];
            $dataSekolah->jumlah_mata_pelajaran_uan = $validatedData['mapelUan'];
            $dataSekolah->save();
    
            // Simpan data pendaftaran ujian
            $pendaftaranUjian = new PendaftaranUjian();
            $pendaftaranUjian->id_pendaftar = $userId;
            $pendaftaranUjian->id_ujian = $validatedData['id_ujian'];
            $pendaftaranUjian->fakultas = $validatedData['fakultas'];
            $pendaftaranUjian->prodi_1 = $validatedData['prodi1'];
            $pendaftaranUjian->prodi_2 = $validatedData['prodi2'];
            $pendaftaranUjian->save();
    
            // Simpan data ayah
            $dataOrangtua = new DataOrangtuaPendaftar();
            $dataOrangtua->id_pendaftar = $userId;
            $dataOrangtua->nama_ayah = $validatedData['namaAyah'];
            $dataOrangtua->tanggal_lahir_ayah = $validatedData['tlAyah'];
            $dataOrangtua->agama_ayah = $validatedData['agamaAyah'];
            $dataOrangtua->pendidikan_ayah = $validatedData['pendidikanTerakhirAyah'];
            $dataOrangtua->pekerjaan_ayah = $validatedData['pekerjaanAyah'];
            $dataOrangtua->penghasilan_ayah = $validatedData['penghasilanAyah'];
            $dataOrangtua->alamat_ayah = $validatedData['alamatAyah'];
            $dataOrangtua->status_ayah = $validatedData['statusAyah'];
            $dataOrangtua->no_hp_ayah = $validatedData['noAyah'];
    
            // Simpan data ibu
            $dataOrangtua->id_pendaftar = $userId;
            $dataOrangtua->nama_ibu = $validatedData['namaIbu'];
            $dataOrangtua->tanggal_lahir_ibu = $validatedData['tlIbu'];
            $dataOrangtua->agama_ibu = $validatedData['agamaIbu'];
            $dataOrangtua->pendidikan_ibu = $validatedData['pendidikanTerakhirIbu'];
            $dataOrangtua->pekerjaan_ibu = $validatedData['pekerjaanIbu'];
            $dataOrangtua->penghasilan_ibu = $validatedData['penghasilanIbu'];
            $dataOrangtua->alamat_ibu = $validatedData['alamatIbu'];
            $dataOrangtua->status_ibu = $validatedData['statusIbu'];
            $dataOrangtua->no_hp_ibu = $validatedData['noIbu'];
    
            // Simpan data wali jika ada
            if (!empty($validatedData['namaWali'])) {
                $dataOrangtua->id_pendaftar = $userId;
                $dataOrangtua->nama_wali = $validatedData['namaWali'];
                $dataOrangtua->tanggal_lahir_wali = $validatedData['tlWali'];
                $dataOrangtua->agama_wali = $validatedData['agamaWali'];
                $dataOrangtua->pendidikan_wali = $validatedData['pendidikanTerakhirWali'];
                $dataOrangtua->pekerjaan_wali = $validatedData['pekerjaanWali'];
                $dataOrangtua->penghasilan_wali = $validatedData['penghasilanWali'];
                $dataOrangtua->alamat_wali = $validatedData['alamatWali'];
                $dataOrangtua->no_hp_wali = $validatedData['noWali'];
            }
            $dataOrangtua->save();
    
    
            return redirect()->route('konfirmasi-formulir')->with('success', 'Data formulir berhasil disimpan.');
        }catch (Exception $e) {
            // Tangkap kesalahan jika terjadi dan siapkan pesan kesalahan untuk ditampilkan
            $errorMessage = $e->getMessage(); // Ambil pesan error dari Exception

            return redirect()->back()->withErrors($errorMessage);
        }
    }

}
