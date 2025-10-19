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
        Schema::create('detailreseps', function (Blueprint $table) {
            $table->id('detail_id'); // primary key
            $table->unsignedBigInteger('resep_id'); // FK ke resep
            $table->unsignedBigInteger('obat_id');  // FK ke obat
            $table->string('dosis');
            $table->integer('jumlah');
            $table->timestamps();
        
            // foreign key constraints
            $table->foreign('resep_id')->references('resep_id')->on('reseps')->onDelete('cascade');
            $table->foreign('obat_id')->references('obat_id')->on('obats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailreseps');
    }
};