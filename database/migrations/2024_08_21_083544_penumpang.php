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
        Schema::create('penumpang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_travel')->constrained('travel')->onDelete('cascade');
            $table->string('kode_booking');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('kota');
            $table->integer('usia');
            $table->year('tahun_lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penumpang');
    }
};
