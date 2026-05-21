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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien')->required();
            $table->integer('usia')->required();
            $table->string('jenis_kelamin')->required();
            $table->json('gejala_terpilih')->required();
            $table->foreignId('penyakit_id')->nullable()->constrained('penyakits')->onDelete('set null');
            $table->decimal('tingkat_akurasi', 5, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
