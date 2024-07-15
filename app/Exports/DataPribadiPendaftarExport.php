<?php

namespace App\Exports;

use App\Models\DataPribadiPendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DataPribadiPendaftarExport implements FromCollection, WithHeadings, WithTitle
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function title(): string
    {
        return 'Data Pribadi Pendaftar';
    }

    public function collection()
    {
        return DataPribadiPendaftar::whereHas('pendaftaranUjian', function ($query) {
                $query->where('id_ujian', $this->id)
                      ->where('flag_is_formulir_verified', 1);
            })
            ->get(['nama_lengkap', 'nik', 'alamat', 'keterangan_tempat_tinggal', 'provinsi', 'kota_kabupaten', 'kecamatan', 'kelurahan','kode_pos','no_telp', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'agama', 'gereja','status_sipil', 'npm_1', 'npm_2']);
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIK',
            'Alamat',
            'Keterangan Tempat Tinggal',
            'Provinsi',
            'Kota/Kabupaten',
            'Kecamatan',
            'Kelurahan',
            'Kode Pos',
            'No Telepon',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Kewarganegaraan',
            'Agama',
            'Gereja',
            'Status Sipil',
            'NPM 1',
            'NPM 2',
        ];
    }
}
