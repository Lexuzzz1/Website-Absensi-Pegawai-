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
                'password' => password_hash('Adm12345', PASSWORD_BCRYPT)
            ],
            [
                'name' => 'Agus',
                'email' => 'agus@gmail.com',
                'role' => 'manajer',
                'password' =>password_hash('Mnj12345', PASSWORD_BCRYPT)
            ],
            [
                'name' => 'Asep',
                'email' => 'asep@gmail.com',
                'role' => 'pegawai',
                'password' =>password_hash('Pgw12345', PASSWORD_BCRYPT)
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
