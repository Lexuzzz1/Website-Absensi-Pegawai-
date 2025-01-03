<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemenData = [
            ['id_departemen' => 'DPT001', 'nama_departemen' => 'Finance'],
            ['id_departemen' => 'DPT002', 'nama_departemen' => 'Human Resources'],
            ['id_departemen' => 'DPT003', 'nama_departemen' => 'Marketing'],
            ['id_departemen' => 'DPT004', 'nama_departemen' => 'Operations'],
            ['id_departemen' => 'DPT005', 'nama_departemen' => 'IT'],
            ['id_departemen' => 'DPT006', 'nama_departemen' => 'Sales'],
            ['id_departemen' => 'DPT007', 'nama_departemen' => 'Customer Support'],
            ['id_departemen' => 'DPT008', 'nama_departemen' => 'Logistics'],
            ['id_departemen' => 'DPT009', 'nama_departemen' => 'Procurement'],
            ['id_departemen' => 'DPT010', 'nama_departemen' => 'Research and Development'],
        ];

        DB::table('departemen')->insert($departemenData);
    }
}
