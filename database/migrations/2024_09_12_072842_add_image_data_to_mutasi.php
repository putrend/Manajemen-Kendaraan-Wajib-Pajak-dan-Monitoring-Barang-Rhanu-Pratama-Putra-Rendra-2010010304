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
        Schema::table('mutasis', function (Blueprint $table) {
            $table->string('stnk_asli')->nullable();
            $table->string('bpkb_asli')->nullable();
            $table->string('ktp_asli')->nullable();
            $table->string('kwitansi_jb')->nullable();
            $table->string('surat_pelepasan')->nullable();
            $table->string('cek_fisik_kendaraan')->nullable();
            $table->string('surat_kuasa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mutasis', function (Blueprint $table) {
            $table->dropColumn('stnk_asli');
            $table->dropColumn('bpkb_asli');
            $table->dropColumn('ktp_asli');
            $table->dropColumn('kwitansi_jb');
            $table->dropColumn('surat_pelepasan');
            $table->dropColumn('cek_fisik_kendaraan');
            $table->dropColumn('surat_kuasa');
        });
    }
};
