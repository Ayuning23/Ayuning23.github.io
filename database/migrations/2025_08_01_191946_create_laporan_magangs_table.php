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
    Schema::create('laporan_magangs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
        $table->string('judul');
        $table->string('file_laporan'); // nama file
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_magangs');
    }
};
