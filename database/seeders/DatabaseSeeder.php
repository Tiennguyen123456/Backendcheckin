<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            \Database\Seeders\Fakes\UserSeeder::class,
            RolesAndPermissionsSeeder::class,
            CountrySeeder::class,
            SystemAdminSeeder::class,
            \Database\Seeders\test\CompanySeeder::class,
            \Database\Seeders\test\EventSeeder::class,
        ]);
    }
}
