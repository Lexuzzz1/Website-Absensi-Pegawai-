<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::create('presensi_dosen', function (Blueprint $table) {
            $table->unsignedBigInteger('nip');
            $table->string('nama_dosen');
            $table->string('id_matkul');
            $table->string('id_ruangan');
            $table->date('date');
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->text('keterangan');
            $table->foreign('nip')->references('nip')->on('dosen')->onDelete('cascade');
            $table->foreign('id_matkul')->references('id_matkul')->on('matakuliah')->onDelete('cascade');
            $table->foreign('id_ruangan')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_dosen');
    }
};
