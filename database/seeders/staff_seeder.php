<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class staff_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            'firstname' => 'KaLab',
            'lastname' => '',
            'nrp' => '2272000',
            'email'=>'2272000@maranatha.ac.id',
            'password' => bcrypt('secret'),
            'id_role'=>('KL')
        ]);
    }
}
