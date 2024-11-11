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
        Schema::create('tbl_laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('harta_id');
            $table->unsignedInteger('kategori_id');
            $table->string('jumlahMasuk', 100)->nullable();
            $table->string('jumlahKeluar', 100)->nullable();
            $table->string('sisaJumlah', 100);
            $table->string('TotalNilaiMasuk');
            $table->string('TotalNilaiKeluar');
            $table->string('SisaTotalNilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_laporan');
    }
};
