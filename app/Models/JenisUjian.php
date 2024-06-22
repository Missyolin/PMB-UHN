<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUjian extends Model
{
    protected $table='jenis_ujian';

    protected $fillable = [
        'id_jenis_ujian',
        'gelombang_ujian',
        'tahun_ajaran',
        'nama_ujian',
        'jenis_ujian',
        'tanggal_buka_pendaftaran',
        'tanggal_tutup_pendaftaran',
        'waktu_pengumuman',
        'flag_is_ujian_opened',
        'flag_is_ujian_hidden',
        'link_ujian'
    ];

    protected $primaryKey = 'id_jenis_ujian';

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran', 'id_tahun_ajaran');
    }
}
