<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';

    protected $fillable = [
        'id_tahun_ajaran',
        'tahun_mulai',
        'tahun_selesai',
    ];

    protected $primaryKey = 'id_tahun_ajaran';

    public function jenisUjian()
    {
        return $this->hasMany(JenisUjian::class, 'tahun_ajaran', 'id_tahun_ajaran');
    }

    public function getTahunAjaranAttribute()
    {
        return $this->tahun_mulai . '-' . $this->tahun_selesai;
    }
}
