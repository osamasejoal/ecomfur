<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'title' => 'Lorem Ipsum is simply dummy text',
            'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'images' => json_encode([
                'seeder_images/about1.jpg',
                'seeder_images/about2.jpg',
                'seeder_images/about3.jpg',
                'seeder_images/about4.jpg',
                'seeder_images/about5.jpg',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
