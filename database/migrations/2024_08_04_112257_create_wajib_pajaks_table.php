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
        Schema::create('wajib_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp')->unique();
            $table->string('nama_wp');
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->date('tgl_daftar');
            $table->string('no_telp')->unique();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wajib_pajaks');
    }
};
