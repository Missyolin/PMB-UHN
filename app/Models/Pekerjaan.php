<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    // Nama tabel yang terkait dengan model ini
    protected $table = 'pekerjaan';

    // Primary key dari tabel
    protected $primaryKey = 'id_pekerjaan';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama_pekerjaan'];

    // Menonaktifkan timestamp jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;
}
