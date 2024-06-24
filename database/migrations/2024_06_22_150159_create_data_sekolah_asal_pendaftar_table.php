<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_sekolah_asal_pendaftar', function (Blueprint $table) {
            $table->id('id_data_sekolah_asal_pendaftar');
            $table->unsignedBigInteger('id_pendaftar');
            $table->string('nama_sekolah',100);
            $table->string('jurusan',15);
            $table->year('tahun_lulus');
            $table->string('no_ijazah',20)->nullable();
            $table->date('tanggal_ijazah')->nullable();
            $table->integer('provinsi_sekolah');
            $table->integer('kota_kabupaten_sekolah');
            $table->decimal('jumlah_nilai_uan',5,2);
            $table->integer('jumlah_mata_pelajaran_uan');
            $table->timestamps();

            $table->foreign('id_pendaftar')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sekolah_asal_pendaftar');
    }
};
