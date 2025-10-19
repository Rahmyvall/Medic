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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id('rekam_id'); // primary key
            $table->unsignedBigInteger('kunjungan_id'); // foreign key ke tabel kunjungan
            $table->string('diagnosa'); // diagnosa dokter
            $table->string('tindakan'); // tindakan yang diberikan
            $table->text('catatan_dokter')->nullable(); // catatan tambahan, boleh kosong
            $table->timestamps();
        
            // definisi foreign key
            $table->foreign('kunjungan_id')
                  ->references('id') // atau 'kunjungan_id' jika di tabel kunjungan juga begitu
                  ->on('kunjungans')  // nama tabel kunjungan
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};