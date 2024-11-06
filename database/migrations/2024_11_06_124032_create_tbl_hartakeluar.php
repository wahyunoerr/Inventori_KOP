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
        Schema::create('tbl_hartakeluar', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('jumlah', 100);
            $table->unsignedBigInteger('harta_id');
            $table->date('harta_keluar');
            $table->timestamps();

            $table->foreign('harta_id')->references('id')->on('tbl_harta')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hartakeluar');
    }
};
