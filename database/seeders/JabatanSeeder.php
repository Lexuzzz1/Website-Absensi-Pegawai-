<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatanData = [
            ['id_jabatan' => 'JBT001', 'nama_jabatan' => 'Staff'],
            ['id_jabatan' => 'JBT002', 'nama_jabatan' => 'Supervisor'],
            ['id_jabatan' => 'JBT003', 'nama_jabatan' => 'Manager'],
            ['id_jabatan' => 'JBT004', 'nama_jabatan' => 'Senior Manager'],
            ['id_jabatan' => 'JBT005', 'nama_jabatan' => 'Director'],
            ['id_jabatan' => 'JBT006', 'nama_jabatan' => 'Senior Director'],
            ['id_jabatan' => 'JBT007', 'nama_jabatan' => 'Vice President'],
            ['id_jabatan' => 'JBT008', 'nama_jabatan' => 'President'],
        ];

        DB::table('jabatan')->insert($jabatanData);
    }
}
