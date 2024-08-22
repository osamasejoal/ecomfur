<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_infos')->insert([
            'name'          => 'ABC Company',
            'phone'         => '01921015560',
            'email'         => 'abc@example.com',
            'location'      => 'Dhaka, Bangladesh',
            'logo'          => 'seeder_images/company_logo.png',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
