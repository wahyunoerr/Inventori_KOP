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
        Schema::create('tbl_harta', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 100);
            $table->string('name', 100);
            $table->string('stok', 100);
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('lokasi_id');
            $table->string('nilai', 100);
            $table->enum('kondisi', ['Sangat Baik', 'Baik', 'Kurang Baik', 'Buruk']);
            $table->string('keterangan', 100);

            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('tbl_kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lokasi_id')->references('id')->on('tbl_lokasi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_harta');
    }
};
