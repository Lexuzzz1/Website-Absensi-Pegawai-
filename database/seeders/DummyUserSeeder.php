<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Jono',
                'email' => 'jono@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('Adm12345')
            ],
            [
                'name' => 'Agus',
                'email' => 'agus@gmail.com',
                'role' => 'manajer',
                'password' => bcrypt('Mnj12345')
            ],
            [
                'name' => 'Asep',
                'email' => 'asep@gmail.com',
                'role' => 'pegawai',
                'password' => bcrypt('Pgw12345')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
