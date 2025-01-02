<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->string('absensi_id',10)->primary();
            $table->string('id_karyawan',10);
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->dateTime('waktu_masuk');
            $table->dateTime('waktu_keluar');
            $table->string('jenis_presensi');
            $table->string('status');
            $table->binary('approval');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
