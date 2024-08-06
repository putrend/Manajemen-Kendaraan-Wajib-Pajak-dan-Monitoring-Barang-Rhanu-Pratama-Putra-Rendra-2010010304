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
        Schema::create('kehilangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('barang_id');
            $table->foreignId('ruangan_id');
            $table->date('tanggal_kehilangan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehilangans');
    }
};
