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
        Schema::create('bpkb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wajib_pajak_id')->constrained('wajib_pajaks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('no_bpkb')->unique();
            $table->string('no_polisi')->unique();
            $table->date('tahun_buat');
            $table->string('keterangan');
            $table->foreignId('samsat_awal_id')->constrained('samsats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('samsat_sekarang_id')->constrained('samsats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('kendaraan_id')->constrained('kendaraans')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bpkb');
    }
};
