<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gereja extends Model
{
    use HasFactory;
    // Nama tabel yang terkait dengan model ini
    protected $table = 'gereja';

    // Primary key dari tabel
    protected $primaryKey = 'id_gereja';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama_gereja', 'nama_panjang'];

    // Menonaktifkan timestamp jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;
}
