<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DummyUserSeeder::class,
            DepartemenSeeder::class,
            GolonganSeeder::class,
            JabatanSeeder::class,
            KaryawanSeeder::class,
        ]);
    }
}
