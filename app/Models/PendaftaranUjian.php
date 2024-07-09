<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranUjian extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_ujian';

    protected $fillable = [
        'id_pendaftar',
        'id_ujian',
        'nomor_ujian',
        'fakultas',
        'prodi_1',
        'prodi_2',
        'nominal_tagihan',
        'status_bayar',
    ];

    protected $primaryKey = 'id_pendaftaran_ujian';

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas', 'kode_fakultas');
    }

    public function prodi1()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_1', 'KodeProdi');
    }

    public function prodi2()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_2', 'KodeProdi');
    }
}
