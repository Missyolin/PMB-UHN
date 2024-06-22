<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jenis_ujian', function (Blueprint $table) {
            $table->id('id_jenis_ujian');
            $table->string('gelombang_ujian', 20);
            $table->unsignedBigInteger('tahun_ajaran'); // Menggunakan unsignedBigInteger untuk foreign key
            $table->string('nama_ujian', 100);
            $table->string('jenis_ujian', 20);
            $table->string('metode_ujian', 20);
            $table->date('tanggal_buka_pendaftaran');
            $table->date('tanggal_tutup_pendaftaran');
            $table->string('waktu_pengumuman', 20);
            $table->boolean('flag_is_ujian_opened')->default(false);
            $table->boolean('flag_is_ujian_hidden')->default(true);
            $table->text('link_ujian')->nullable();
            $table->timestamps();

            // Menambahkan constraint foreign key untuk tahun_ajaran
            $table->foreign('tahun_ajaran')
                ->references('id_tahun_ajaran')->on('tahun_ajaran')
                ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('jenis_ujian');
        $table->dropColumn('tanggal_ujian');
    }
};
