<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleData = [
            ['id_role' => 'admin', 'nama_role' => 'Administrator'],
            ['id_role' => 'manajer', 'nama_role' => 'Manager'],
            ['id_role' => 'pegawai', 'nama_role' => 'Employee'],
        ];

        DB::table('role')->insert($roleData);
    }
}
