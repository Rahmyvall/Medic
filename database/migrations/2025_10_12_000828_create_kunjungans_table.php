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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id(); // kunjungan_id
            $table->unsignedBigInteger('pasien_id'); // foreign key ke tabel pasien
            $table->unsignedBigInteger('dokter_id'); // foreign key ke tabel dokter
            $table->dateTime('tanggal_kunjungan'); // tanggal kunjungan
            $table->enum('jenis_kunjungan', ['rawat_jalan', 'rawat_inap', 'IGD']); // jenis kunjungan
            $table->enum('status', ['terjadwal', 'selesai', 'batal', 'proses'])->default('terjadwal'); // status kunjungan
            $table->timestamps(); // created_at & updated_at
        
            // foreign key constraints
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};