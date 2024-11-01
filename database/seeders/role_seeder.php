<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['id_role' => 'KL', 'role_name' => 'Kepala Lab'],
            ['id_role' => 'KSL', 'role_name' => 'Koordinator'],
            ['id_role' => 'SL', 'role_name' => 'Staff'],
        ]);
    }
}
