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
        Schema::create('tbl_hartamsuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harta_id');
            $table->string('jumlah', 100);
            $table->string('keterangan', 100);
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('harta_id')->references('id')->on('tbl_harta')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hartamasuk');
    }
};
