<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 
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
use App\Models\AsalSekolah;
use App\Models\Fakultas;
use App\Models\ProgramStudi;
use App\Models\Pekerjaan;
use App\Models\Gereja;

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

    public function __construct()
    {
        $this->middleware('check.registration:id_ujian')->only('getFormulir');
    }

    public function getFormulir($id)
    {
        Carbon::setLocale('id'); 
        
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $tahun_ajaran = TahunAjaran::with('jenisUjian')->get();
        $asal_sekolah = AsalSekolah::all()->pluck('Nama');
        $fakultas = Fakultas::all();
        $program_studi = ProgramStudi::all();
        $pekerjaan = Pekerjaan::all();
        $gereja = Gereja::all();

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
        
        // Mendapatkan ID user yang sedang login
        $userId = Auth::id();

        // Periksa apakah pengguna sudah mendaftar ujian atau belum
        $userHasRegisteredForExam = PendaftaranUjian::where('id_pendaftar', $userId)
            ->where('id_ujian', $selectedUjian->id_jenis_ujian)
            ->exists() || session()->has('registered_exam') && session()->get('registered_exam') == $selectedUjian->id_jenis_ujian;

        // Ambil halaman formulir
        $view = view('User.formulir', compact('provinces', 'regencies', 'districts', 'selectedUjian', 'tahun_ajaran', 'id', 'asal_sekolah', 'fakultas', 'program_studi', 'pekerjaan', 'gereja'));

        // Buat response dari view
        $response = new Response($view);

        // Atur header untuk mengontrol cache
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

        // Kembalikan respons
        return $response;
    }
    
    public function simpanFormulir(Request $request)
    {
        try{

            $validatedData = $request->validate([
                // Data Pribadi
                'namaLengkap' => 'required|string|max:100',
                'nik' => 'required|string|max:16',
                'alamat' => 'required|string|max:100',
                'keterangan' => 'required|string|max:20',
                'provinsi' => 'required|string',
                'kota_kabupaten' => 'required|string',
                'kecamatan' => 'required|string',
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
                'provSekolah' => 'required|string',
                'kotaSekolah' => 'required|string',
                'nisn' => 'required|string|max:10',
                'asalSekolah' => 'required|string|max:255',
                'jurusan' => 'required|string|max:15',
                'tahunLulus' => 'required|integer',
                'nilaiUan' => 'required|numeric',
                'mapelUan' => 'required|integer',
                // Data Ujian
                'id_ujian' => 'required|integer',
                // Data Orang Tua
                'namaAyah' => 'required|string|max:100',
                'tlAyah' => 'required|date',
                'agamaAyah' => 'required|string|max:10',
                'pendidikanTerakhirAyah' => 'required|string|max:20',
                'pekerjaanAyah' => 'required|string|max:50',
                'penghasilanAyah' => 'required|string|max:50',
                'alamatAyah' => 'required|string|max:255',
                'statusAyah' => 'required|string|max:12',
                'noAyah' => 'required|string|max:15',
                'namaIbu' => 'required|string|max:100',
                'tlIbu' => 'required|date',
                'agamaIbu' => 'required|string|max:10',
                'pendidikanTerakhirIbu' => 'required|string|max:20',
                'pekerjaanIbu' => 'required|string|max:50',
                'penghasilanIbu' => 'required|string|max:50',
                'alamatIbu' => 'required|string|max:255',
                'statusIbu' => 'required|string|max:12',
                'noIbu' => 'required|string|max:15',
                'namaWali' => 'nullable|string|max:100',
                'tlWali' => 'nullable|date',
                'agamaWali' => 'nullable|string|max:10',
                'pendidikanTerakhirWali' => 'nullable|string|max:20',
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
            $dataPribadi->id_ujian = $validatedData['id_ujian'];
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
            $dataSekolah->id_ujian = $validatedData['id_ujian'];
            $dataSekolah->provinsi_sekolah = $validatedData['provSekolah'];
            $dataSekolah->kota_kabupaten_sekolah = $validatedData['kotaSekolah'];
            $dataSekolah->nisn = $validatedData['nisn'];
            $dataSekolah->nama_sekolah = $validatedData['asalSekolah'];
            $dataSekolah->jurusan = $validatedData['jurusan'];
            $dataSekolah->tahun_lulus = $validatedData['tahunLulus'];
            $dataSekolah->jumlah_nilai_uan = $validatedData['nilaiUan'];
            $dataSekolah->jumlah_mata_pelajaran_uan = $validatedData['mapelUan'];
            $dataSekolah->save();
    
            // Simpan data pendaftaran ujian
            $pendaftaranUjian = new PendaftaranUjian();
            $pendaftaranUjian->id_pendaftar = $userId;
            $pendaftaranUjian->id_ujian = $validatedData['id_ujian'];
            $pendaftaranUjian->fakultas = $validatedData['fakultas'];
            $pendaftaranUjian->prodi_1 = $validatedData['prodi1'];
            $pendaftaranUjian->prodi_2 = $validatedData['prodi2'] ?? null;

            // NOMOR UJIAN
            $tahun = date('y');
            $jenisUjian = JenisUjian::findOrFail($validatedData['id_ujian']);
            $gelombang = $jenisUjian->gelombang_ujian;
            $nomorUrut = sprintf('%04d', PendaftaranUjian::count() + 1); // Misalnya menggunakan jumlah pendaftaran + 1
            // Format nomor ujian sesuai dengan yang diinginkan
            $nomorUjian = "{$validatedData['fakultas']}-{$tahun}-{$gelombang}-{$nomorUrut}";

            $pendaftaranUjian->nomor_ujian = $nomorUjian;

            $pendaftaranUjian->save();
    
            // Simpan data ayah
            $dataOrangtua = new DataOrangtuaPendaftar();
            $dataOrangtua->id_pendaftar = $userId;
            $dataOrangtua->id_ujian = $validatedData['id_ujian'];
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
    
            return redirect()->route('preview-formulir',  ['id' => $validatedData['id_ujian']])->with('success', 'Data formulir berhasil disimpan.');
        }catch (Exception $e) {
            // Tangkap kesalahan jika terjadi dan siapkan pesan kesalahan untuk ditampilkan
            $errorMessage = $e->getMessage(); // Ambil pesan error dari Exception

            return redirect()->back()->withErrors($errorMessage);
        }
    }

    public function previewFormulir($id)
    {
        // Ambil data ujian berdasarkan ID
        $selectedUjian = null;
        $tahun_ajaran = TahunAjaran::with('jenisUjian')->get();

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

        // Ambil data pendaftaran ujian berdasarkan id ujian
        $pendaftaran = PendaftaranUjian::where('id_ujian', $id)->get();

        // Ambil id_pendaftar dari pendaftaran
        $id_pendaftars = $pendaftaran->pluck('id_pendaftar')->toArray();

        // Ambil data terkait dari tabel lain berdasarkan id_pendaftar dengan eager loading
        $dataPribadi = DataPribadiPendaftar::whereIn('id_pendaftar', $id_pendaftars)
            ->where('id_ujian', $id)
            ->with('user') // Eager load relasi user
            ->get();
        
        $dataOrangtua = DataOrangtuaPendaftar::whereIn('id_pendaftar', $id_pendaftars)
            ->where('id_ujian', $id)
            ->get();
        
        $dataSekolahAsal = DataSekolahAsalPendaftar::whereIn('id_pendaftar', $id_pendaftars)
            ->where('id_ujian', $id)
            ->get();

        // Ambil data fakultas untuk nama_fakultas
        $fakultas = Fakultas::all()->keyBy('kode_fakultas');

        // Gabungkan data yang relevan ke dalam satu array
        $peserta = $pendaftaran->map(function ($pendaftar) use ($dataPribadi, $dataOrangtua, $dataSekolahAsal, $fakultas) {
            $pribadi = $dataPribadi->firstWhere('id_pendaftar', $pendaftar->id_pendaftar);
            return [
                'pendaftar' => $pendaftar,
                'pribadi' => $pribadi,
                'orangtua' => $dataOrangtua->firstWhere('id_pendaftar', $pendaftar->id_pendaftar),
                'sekolah' => $dataSekolahAsal->firstWhere('id_pendaftar', $pendaftar->id_pendaftar),
                'email' => $pribadi ? $pribadi->user->email : null, // Ambil email dari relasi user
                'nama_fakultas' => $fakultas[$pendaftar->fakultas]->nama_fakultas ?? 'Fakultas tidak ditemukan',
                'nama_prodi1' => $pendaftar->prodi1->Nama_Prodi ?? 'Prodi 1 tidak ditemukan',
                'nama_prodi2' => $pendaftar->prodi2->Nama_Prodi ?? ''
            ];
        });

        return view('User.previewFormulir', compact('selectedUjian', 'peserta'));
    }

    public function getKonfirmasi($id)
    {
        $pendaftaran = PendaftaranUjian::where('id_ujian', $id)->get();
        // Ambil id_pendaftar dari pendaftaran
        $id_pendaftars = $pendaftaran->pluck('id_pendaftar')->toArray();

        // Ambil data terkait dari tabel lain berdasarkan id_pendaftar dengan eager loading
        $dataPribadi = DataPribadiPendaftar::whereIn('id_pendaftar', $id_pendaftars)
        ->where('id_ujian', $id)
        ->get(['nama_lengkap']); // Ambil hanya kolom 'nama_lengkap'

        $tahun_ajaran = TahunAjaran::with('jenisUjian')->get();
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
        $konfirmasiStatus = $pendaftaran->first()->flag_is_formulir_verified == 1;

        return view('User.konfirmasi', compact('selectedUjian', 'dataPribadi', 'konfirmasiStatus', 'pendaftaran'));
    }




}
