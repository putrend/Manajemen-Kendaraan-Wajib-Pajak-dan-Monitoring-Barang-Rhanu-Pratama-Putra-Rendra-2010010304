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
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('ruangan_id');
            $table->foreignId('barang_id');
            $table->integer('jumlah_perbaikan');
            $table->string('nama_perbaikan');
            $table->string('kondisi');
            $table->date('lama_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikans');
    }
};
