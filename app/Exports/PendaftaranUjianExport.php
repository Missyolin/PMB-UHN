<?php

namespace App\Exports;

use App\Models\PendaftaranUjian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PendaftaranUjianExport implements FromCollection, WithHeadings, WithTitle
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function title(): string
    {
        return 'Pendaftaran Ujian';
    }

    public function collection()
    {
        return PendaftaranUjian::where('id_ujian', $this->id)
            ->where('flag_is_formulir_verified', 1)
            ->get(['id_pendaftar', 'nomor_ujian', 'fakultas', 'prodi_1', 'prodi_2']);
    }

    public function headings(): array
    {
        return [
            'ID Pendaftar',
            'Nomor Ujian',
            'Fakultas',
            'Prodi 1',
            'Prodi 2',
        ];
    }
}

