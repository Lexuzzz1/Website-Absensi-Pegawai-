<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    
    protected $primaryKey = 'absensi_id'; // Set absensi_id as the primary key

    public $incrementing = false; // Disable auto-incrementing for primary key

    protected $keyType = 'string'; // Set the primary key type to string

    protected $fillable = [
        'absensi_id',
        'id_karyawan',
        'waktu_masuk',
        'waktu_keluar',
        'jenis_presensi',
        'status',
        'approval',
    ];

    public $timestamps = false;

    /**
     * Generate a unique absensi_id.
     *
     * @return string
     */
    public static function generateAbsensiId()
    {
        $prefix = 'ABS'; // Prefix for absensi ID
        $latest = self::latest('absensi_id')->first();

        if (!$latest) {
            return $prefix . '0001';
        }

        $lastNumber = (int) substr($latest->absensi_id, 3);
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }
}
