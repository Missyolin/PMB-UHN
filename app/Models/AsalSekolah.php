<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AsalSekolah extends Model
{
    // Jika tabel tidak menggunakan timestamp, tambahkan ini
    public $timestamps = false;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'asal_sekolah';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'SekolahID', 
        'Nama', 
        'Propinsi', 
        'Alamat1', 
        'Alamat2', 
        'Kota', 
        'Kabupaten', 
        'JenisSekolahID'
    ];

    // Primary Key dari tabel
    protected $primaryKey = 'SekolahID';

    // Jika primary key bukan incrementing integer
    public $incrementing = false;

    // Tipe data dari primary key
    protected $keyType = 'int';
}
