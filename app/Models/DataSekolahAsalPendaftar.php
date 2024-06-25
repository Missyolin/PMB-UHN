<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSekolahAsalPendaftar extends Model
{
    protected $table = 'data_sekolah_asal_pendaftar';

    protected $fillable =[
        'id_pendaftar',
        'id_ujian',
        'nama_sekolah',
        'jurusan',
        'tahun_lulus',
        'no_ijazah',
        'tanggal_ijazah',
        'provinsi_sekolah',
        'kota_kabupaten_sekolah',
        'jumlah_nilai_uan',
        'jumlah_mata_pelajaran_uan',
    ];

    protected $primaryKey = 'id_data_sekolah_asal_pendaftar';
}
