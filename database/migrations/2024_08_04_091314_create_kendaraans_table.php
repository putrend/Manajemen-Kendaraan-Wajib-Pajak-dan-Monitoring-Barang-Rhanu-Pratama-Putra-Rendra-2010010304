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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dealer_id')->constrained('dealers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama_kendaraan');
            $table->string('jenis');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('warna');
            $table->string('kondisi');
            $table->string('merk');
            $table->string('model');
            $table->string('isi_silinder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
