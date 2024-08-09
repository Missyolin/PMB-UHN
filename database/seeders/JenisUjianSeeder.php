<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\JenisUjian;

class JenisUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_ujian')->insert([
            [
                'id_jenis_ujian' => 1,
                'gelombang_ujian' => '1',
                'tahun_ajaran' => 1,
                'nama_ujian' => 'PMB Bebas Testing',
                'jenis_ujian' => 'Non-Kedokteran',
                'metode_ujian' => 'Bebas Testing',
                'biaya_ujian' => 0,
                'fakultas_tersedia' => 'EK',
                'tanggal_buka_pendaftaran' => '2024-06-10',
                'tanggal_tutup_pendaftaran' => '2024-06-14',
                'waktu_pengumuman' => 'Realtime',
            ],
        ]);
    }
}
