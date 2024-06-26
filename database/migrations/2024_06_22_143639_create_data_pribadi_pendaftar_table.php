<?php

// Migrasi untuk tabel data_pribadi_pendaftar
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
        Schema::create('data_pribadi_pendaftar', function (Blueprint $table) {
            $table->id('id_data_pribadi');
            $table->unsignedBigInteger('id_pendaftar');
            $table->unsignedBigInteger('id_ujian');
            $table->string('nama_lengkap', 100);
            $table->string('nik', 16);
            $table->string('alamat', 100);
            $table->string('keterangan_tempat_tinggal', 20);
            $table->string('provinsi'); // Ubah tipe kolom menjadi char(2)
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan', 50);
            $table->string('kode_pos', 6)->nullable();
            $table->string('no_telp', 13);
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan', 50);
            $table->string('agama', 10);
            $table->string('gereja', 10);
            $table->string('status_sipil', 15);
            $table->string('npm_1', 8)->nullable();
            $table->string('npm_2', 8)->nullable();
            $table->timestamps();

            $table->foreign('id_pendaftar')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pribadi_pendaftar');
    }
};
