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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id('resep_id'); // Primary Key
            $table->unsignedBigInteger('rekam_id'); // Foreign Key ke rekam medis
            $table->unsignedBigInteger('dokter_id'); // Foreign Key ke dokter
            $table->date('tanggal_resep'); // Tanggal resep
            $table->text('catatan')->nullable(); // Catatan tambahan
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('rekam_id')->references('rekam_id')->on('rekam_medis')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};