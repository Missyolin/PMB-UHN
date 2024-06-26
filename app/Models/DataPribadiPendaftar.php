<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPribadiPendaftar extends Model
{
    protected $table='data_pribadi_pendaftar';

    protected $fillable = [
        'nama_lengkap',
        'id_data_pribadi',
        'id_ujian',
        'nik',
        'alamat',
        'keterangan_tempat_tinggal',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'no_telp',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'gereja',
        'status_sipil',
        'npm_1',
        'npm_2',
    ];

    
    protected $primaryKey = 'id_data_pribadi_pendaftar';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pendaftar');
    }

}
