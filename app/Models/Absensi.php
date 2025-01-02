<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'absensi';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'id_karyawan',
        'waktu_masuk',
        'waktu_keluar',
        'jenis_presensi',
        'status',
        'approval',
    ];


    public $timestamps = false;
}