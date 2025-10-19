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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('dokter_id')->unique();
            $table->string('nama');
            $table->string('photo_dokter');
            $table->string('spesialisasi')->nullable();
            $table->string('jadwal_praktek')->nullable();
            $table->string('no_str')->unique(); // Nomor STR dokter harus unik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};