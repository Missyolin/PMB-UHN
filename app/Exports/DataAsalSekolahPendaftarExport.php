<?php

namespace App\Exports;

use App\Models\DataSekolahAsalPendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DataAsalSekolahPendaftarExport implements FromCollection, WithHeadings, WithTitle
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return DataSekolahAsalPendaftar::whereHas('pendaftaranUjian', function ($query) {
                $query->where('id_ujian', $this->id)
                      ->where('flag_is_formulir_verified', 1);
            })
            ->get(['id_pendaftar','nisn', 'nama_sekolah', 'jurusan', 'tahun_lulus', 'provinsi_sekolah', 'kota_kabupaten_sekolah', 'jumlah_nilai_uan', 'jumlah_mata_pelajaran_uan']);
    }

    public function title(): string
    {
        return 'Data Sekolah Asal Pendaftar';
    }

    public function headings(): array
    {
        return [
            'ID Pendaftar',
            'NISN',
            'Nama Sekolah',
            'Jurusan',
            'Tahun Lulus',
            'Provinsi Sekolah',
            'Kota/Kabupaten Sekolah',
            'Jumlah Nilai UAN',
            'Jumlah Mata Pelajaran UAN',
        ];
    }
}
