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
        Schema::create('data_pribadi_pendaftar', function (Blueprint $table) {
            $table->id('id_data_pribadi');
            $table->string('nama_lengkap',100);
            $table->string('nik',16);
            $table->string('alamat',100);
            $table->string('keterangan_tempat_tinggal',20);
            $table->integer('provinsi');
            $table->integer('kota_kabupaten');
            $table->integer('kecamatan');
            $table->string('kelurahan',50);
            $table->string('kode_pos',6);
            $table->string('no_telp',13);
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan',50);
            $table->string('agama',10);
            $table->string('gereja',10);
            $table->string('status_sipil',15);
            $table->string('npm_1',8);
            $table->string('npm_2',8);
            $table->timestamps();
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
