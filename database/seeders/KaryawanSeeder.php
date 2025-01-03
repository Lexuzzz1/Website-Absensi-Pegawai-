<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch data from `users`, `departemen`, `golongan`, and `jabatan` tables
        $users = DB::table('users')->get();
        $departemen = DB::table('departemen')->pluck('id_departemen')->toArray();
        $golongan = DB::table('golongan')->pluck('id_golongan')->toArray();
        $jabatan = DB::table('jabatan')->pluck('id_jabatan')->toArray();

        $karyawanData = [];
        foreach ($users as $index => $user) {
            $karyawanData[] = [
                'id_karyawan' => 'KRY' . str_pad($index + 1, 4, '0', STR_PAD_LEFT), // Generate ID: KRY0001, KRY0002, etc.
                'id_jabatan' => $jabatan[$index % count($jabatan)], // Assign jabatan cyclically
                'id_golongan' => $golongan[$index % count($golongan)], // Assign golongan cyclically
                'id_departemen' => $departemen[$index % count($departemen)], // Assign departemen cyclically
                'nama' => $user->name, // Name from users table
                'alamat' => 'Alamat for ' . $user->name, // Placeholder address
                'email' => $user->email, // Email from users table
                'no_telepon' => '08' . rand(1000000000, 9999999999), // Generate a random phone number
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the `karyawan` table
        DB::table('karyawan')->insert($karyawanData);
    }
}
