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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50)->nullable()->unique();
            $table->string('nama_barang', 100);
            $table->string('kategori', 50);
            $table->string('merek', 100);
            $table->enum('kondisi_fisik', ['baik', 'rusak_ringan', 'rusak_berat'])->default('baik');
            $table->string('lokasi_penempatan', 100);
            $table->unsignedInteger('jumlah')->default(1);
            $table->date('tanggal_pembelian')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
