<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOrangtuaPendaftar extends Model
{
   protected $table='data_orangtua_pendaftar';

   protected $fillable = [
      'id_pendaftar',
      'id_ujian',
    'nama_ayah',
    'tanggal_lahir_ayah',
    'agama_ayah',
    'pendidikan_ayah',
    'pekerjaan_ayah',
    'penghasilan_ayah',
    'alamat_ayah',
    'status_ayah',
    'no_hp_ayah',
    'nama_ibu',
    'tanggal_lahir_ibu',
    'agama_ibu',
    'pendidikan_ibu',
    'pekerjaan_ibu',
    'penghasilan_ibu',
    'alamat_ibu',
    'status_ibu',
    'no_hp_ibu',
    'nama_wali',
    'tanggal_lahir_wali',
    'agama_wali',
    'pendidikan_wali',
    'pekerjaan_wali',
    'penghasilan_wali',
    'alamat_wali',
    'no_hp_wali',
   ];

   protected $primaryKey = 'id_data_orangtua_pendaftar';

   public function pendaftaranUjian()
    {
        // Assuming there is a foreign key 'id_pendaftar' in this model
        return $this->belongsTo(PendaftaranUjian::class, 'id_pendaftar', 'id_pendaftar');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
