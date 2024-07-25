<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // UserSeeder
        $this->call(UserSeeder::class);

        // AboutSeeder
        $this->call(AboutSeeder::class);

        // ServiceSeeder
        $this->call(ServiceSeeder::class);

        // FrontImageSeeder
        $this->call(FrontImageSeeder::class);
    }
}
