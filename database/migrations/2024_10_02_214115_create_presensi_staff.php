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
        Schema::create('presensi_staff', function (Blueprint $table) {
            $table->string('nrp');
            $table->string('nama_staff');
            $table->string('id_tugas');
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->time('foto_sebelum_maintenance')->nullable();
            $table->time('foto_sesudah_maintenance')->nullable();
            $table->foreign('nrp')->references('nrp')->on('users')->onDelete('cascade');
            $table->foreign('id_tugas')->references('id_tugas')->on('tugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_staff');
    }
};
