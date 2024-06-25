<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TahunAjaran;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_ajaran')->insert([
            [
                'tahun_mulai' => 2021,
                'tahun_selesai' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun_mulai' => 2022,
                'tahun_selesai' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun_mulai' => 2023,
                'tahun_selesai' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
