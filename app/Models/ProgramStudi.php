<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    // Nama tabel yang terkait dengan model ini
    protected $table = 'program_studi';

    // Primary key dari tabel
    protected $primaryKey = 'id_prodi';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['KodeProdi', 'KodeFakultas', 'Nama_Prodi', 'Format_NomorUjian'];

    // Menonaktifkan timestamp jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;
    
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'KodeFakultas', 'kode_fakultas');
    }

    public function pendaftaranUjian1()
    {
        return $this->hasMany(PendaftaranUjian::class, 'prodi_1', 'KodeProdi');
    }

    public function pendaftaranUjian2()
    {
        return $this->hasMany(PendaftaranUjian::class, 'prodi_2', 'KodeProdi');
    }
}
