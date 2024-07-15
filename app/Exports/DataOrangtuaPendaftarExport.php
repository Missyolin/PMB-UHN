<?php

namespace App\Exports;

use App\Models\DataOrangtuaPendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DataOrangtuaPendaftarExport implements FromCollection, WithHeadings, WithTitle
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function title():string
    {
        return 'Data Orangtua Pendaftar';
    }

    public function collection()
    {
        return DataOrangtuaPendaftar::whereHas('pendaftaranUjian', function ($query) {
                $query->where('id_ujian', $this->id)
                      ->where('flag_is_formulir_verified', 1);
            })
            ->get(['id_pendaftar', 'nama_ayah', 'tanggal_lahir_ayah', 'agama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'alamat_ayah', 'status_ayah', 'no_hp_ayah','nama_ibu', 'tanggal_lahir_ibu', 'agama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'alamat_ibu', 'status_ibu', 'no_hp_ibu', 'nama_wali', 'tanggal_lahir_wali', 'agama_wali', 'pendidikan_wali', 'pekerjaan_wali', 'penghasilan_wali', 'alamat_wali', 'no_hp_wali']);
    }

    public function headings(): array
    {
        return [
            'ID Pendaftar',
            'Nama Ayah',
            'Tanggal Lahir Ayah',
            'Agama Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            'Alamat Ayah',
            'Status Ayah',
            'No HP Ayah',
            'Nama Ibu',
            'Tanggal Lahir Ibu',
            'Agama Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'Alamat Ibu',
            'Status Ibu',
            'No HP Ibu',
            'Nama Wali',
            'Tanggal Lahir Wali',
            'Agama Wali',
            'Pendidikan Wali',
            'Pekerjaan Wali',
            'Penghasilan Wali',
            'Alamat Wali',
            'No HP Wali',
        ];
    }
}

