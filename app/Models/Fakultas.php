<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';

    protected $primaryKey = 'kode_fakultas';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_fakultas',
        'nama_fakultas'
    ];

    public $timestamps = false;

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'KodeFakultas', 'kode_fakultas');
    }
}

