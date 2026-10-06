<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nama_guru', 40);
            $table->string('nip', 30)->nullable();       // ← max 30
            $table->string('jabatan', 100)->nullable();
            $table->string('mapel', 40)->nullable();
            $table->string('foto', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};