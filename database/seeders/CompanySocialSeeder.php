<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_socials')->insert([
            'name'          => 'Facebook',
            'link'         => 'https://www.facebook.com/',
            'icon'         => 'bx bxl-facebook-square',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
