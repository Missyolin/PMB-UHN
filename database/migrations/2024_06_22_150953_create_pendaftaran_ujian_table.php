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
        Schema::create('pendaftaran_ujian', function (Blueprint $table) {
            $table->id('id_pendaftaran_ujian');
            $table->unsignedBigInteger('id_pendaftar');
            $table->unsignedBigInteger('id_ujian');
            $table->string('fakultas', 30);
            $table->string('prodi_1', 30);
            $table->string('prodi_2', 30)->nullable();
            $table->decimal('nominal_tagihan', 9, 2)->nullable();
            $table->boolean('status_bayar')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_pendaftar')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ujian')->references('id_jenis_ujian')->on('jenis_ujian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_ujian');
    }
};

