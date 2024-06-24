<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranUjian extends Model
{
    protected $table = 'pendaftaran_ujian';

    protected $fillable = [
        'id_pendaftar',
        'id_ujian',
        'fakultas',
        'prodi_1',
        'prodi_2',
        'nominal_tagihan',
        'status_bayar',
    ];

    protected $primaryKey = 'id_pendaftaran_ujian';
}
