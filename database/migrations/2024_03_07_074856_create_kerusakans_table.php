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
        Schema::create('kerusakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id');
            $table->foreignId('ruangan_id');
            $table->foreignId('user_id');
            $table->integer('jumlah_rusak');
            $table->string('kondisi');
            $table->enum('penanganan', ['perbaikan', 'rusak_total']);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakans');
    }
};
