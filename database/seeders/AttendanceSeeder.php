<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        // Pastikan Foreign Key Checks dimatikan jika Anda tidak yakin dengan integritas data yang ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Insert data attendance
        DB::table('attendances')->insert([
            [
                'employee_id' => 1,
                'check_in' => Carbon::now()->subDays(1)->toDateTimeString(), // check-in 1 hari yang lalu
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'employee_id' => 2,
                'check_in' => Carbon::now()->subDays(2)->toDateTimeString(), // check-in 2 hari yang lalu
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            // Anda dapat menambahkan data lainnya sesuai kebutuhan
        ]);

        // Nyalakan kembali Foreign Key Checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
