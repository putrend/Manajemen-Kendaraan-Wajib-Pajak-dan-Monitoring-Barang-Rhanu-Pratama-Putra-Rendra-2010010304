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
        Schema::create('stnk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bpkb_id')->constrained('bpkb')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('no_stnk')->unique();
            $table->string('warna_tnkb');
            $table->string('kode_lokasi');
            $table->date('masa_berlaku_stnk');
            $table->date('masa_berlaku_tnkb');
            $table->date('tgl_buat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stnk');
    }
};
