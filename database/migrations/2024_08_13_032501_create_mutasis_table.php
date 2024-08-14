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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bpkb_id')->constrained('bpkb')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('samsat_awal_id')->constrained('samsats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('samsat_tujuan_id')->constrained('samsats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('wajib_pajak_id')->constrained('wajib_pajaks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('no_pol_lama');
            $table->string('no_pol_baru');
            $table->enum('status', ['Berlaku', 'Belum Berlaku']);
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
