<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PendaftarMultipleExport implements WithMultipleSheets
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sheets(): array
    {
        return [
            'Pendaftaran Ujian' => new PendaftaranUjianExport($this->id),
            'Data Pribadi Pendaftar' => new DataPribadiPendaftarExport($this->id),
            'Data Asal Sekolah Pendaftar' => new DataAsalSekolahPendaftarExport($this->id),
            'Data Orangtua Pendaftar' => new DataOrangtuaPendaftarExport($this->id),
        ];
    }
}
