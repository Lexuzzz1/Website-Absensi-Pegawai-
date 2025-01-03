<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('id_karyawan',10)->primary();
            $table->string('id_jabatan',10);
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->string('id_golongan',10);
            $table->foreign('id_golongan')->references('id_golongan')->on('golongan');
            $table->string('id_departemen',10);
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen');
            $table->string('nama');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}

