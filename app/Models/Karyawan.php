<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $primaryKey = 'karyawan_id';
    public $timestamps = false; 

    // Kolom yang dapat diisi
    protected $fillable = [
        'karyawan_id',
        'id_jabatan',
        'id_golongan',
        'id_departemen',
        'nama',
        'alamat',
        'email',
        'no_telepon',
    ];

    // Relasi ke model Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    // Relasi ke model Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id_golongan');
    }

    // Relasi ke model Departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'departemen_id');
    }

    // Relasi ke model Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_karyawan', 'karyawan_id');
    }
}
