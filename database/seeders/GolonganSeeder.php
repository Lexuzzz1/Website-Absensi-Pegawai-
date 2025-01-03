<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $golonganData = [
            ['id_golongan' => 'GL001', 'nama_golongan' => 'Junior Staff'],
            ['id_golongan' => 'GL002', 'nama_golongan' => 'Senior Staff'],
            ['id_golongan' => 'GL003', 'nama_golongan' => 'Supervisor'],
            ['id_golongan' => 'GL004', 'nama_golongan' => 'Assistant Manager'],
            ['id_golongan' => 'GL005', 'nama_golongan' => 'Manager'],
            ['id_golongan' => 'GL006', 'nama_golongan' => 'Senior Manager'],
            ['id_golongan' => 'GL007', 'nama_golongan' => 'Director'],
            ['id_golongan' => 'GL008', 'nama_golongan' => 'Senior Director'],
            ['id_golongan' => 'GL009', 'nama_golongan' => 'Vice President'],
            ['id_golongan' => 'GL010', 'nama_golongan' => 'President'],
        ];

        DB::table('golongan')->insert($golonganData);
    }
}
