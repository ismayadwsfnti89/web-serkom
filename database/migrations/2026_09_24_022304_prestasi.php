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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->uuid('id_prestasi')->primary();
            $table->string('nama_prestasi', 100);
            $table->string('tingkat', 30);
            $table->string('juara', 30)->nullable();
            $table->year('tahun')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto', 100)->nullable();
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
