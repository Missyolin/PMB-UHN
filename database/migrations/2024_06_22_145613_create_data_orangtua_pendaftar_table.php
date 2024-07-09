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
        Schema::create('data_orangtua_pendaftar', function (Blueprint $table) {
            $table->id('id_data_orangtua_pendaftar');
            $table->unsignedBigInteger('id_pendaftar');
            $table->unsignedBigInteger('id_ujian');
            $table->string('nama_ayah',50);
            $table->date('tanggal_lahir_ayah');
            $table->string('agama_ayah',10);
            $table->string('pendidikan_ayah',15);
            $table->string('pekerjaan_ayah',30);
            $table->string('penghasilan_ayah',30);
            $table->string('alamat_ayah',50);
            $table->string('status_ayah',12);
            $table->string('no_hp_ayah',13);
            $table->string('nama_ibu',50);
            $table->date('tanggal_lahir_ibu');
            $table->string('agama_ibu',10);
            $table->string('pendidikan_ibu',15);
            $table->string('pekerjaan_ibu',30);
            $table->string('penghasilan_ibu',30);
            $table->string('alamat_ibu',50);
            $table->string('status_ibu',12);
            $table->string('no_hp_ibu',13);
            $table->string('nama_wali',50)->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('agama_wali',10)->nullable();
            $table->string('pendidikan_wali',15)->nullable();
            $table->string('pekerjaan_wali',30)->nullable();
            $table->string('penghasilan_wali',30)->nullable();
            $table->string('alamat_wali',50)->nullable();
            $table->string('no_hp_wali',13)->nullable();
            $table->timestamps();

            $table->foreign('id_pendaftar')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ujian')->references('id_jenis_ujian')->on('jenis_ujian')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_orangtua_pendaftar');
    }
};
