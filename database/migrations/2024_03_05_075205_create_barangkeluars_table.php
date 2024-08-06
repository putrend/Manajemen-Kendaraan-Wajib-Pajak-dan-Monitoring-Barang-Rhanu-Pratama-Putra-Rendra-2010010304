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
        Schema::create('barangkeluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id');
            $table->foreignId('ruangan_id');
            $table->foreignId('user_id');
            $table->integer('jumlah_keluar');
            $table->date('tanggal_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangkeluars');
    }
};
