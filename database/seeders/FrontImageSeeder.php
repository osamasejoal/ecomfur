<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('front_images')->insert([
            'welcome_img'       => 'seeder_images/fi_welcome_img.jpeg',
            'welcome_title'     => 'Welcome to Store',
            'welcome_desc'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'gallery_img_1'     => 'seeder_images/fi_gallery_img_1.jpg',
            'gallery_img_2'     => 'seeder_images/fi_gallery_img_2.jpg',
            'gallery_img_3'     => 'seeder_images/fi_gallery_img_3.jpg',
            'gallery_img_4'     => 'seeder_images/fi_gallery_img_4.jpg',
            'product_icon_1'    => 'seeder_images/fi_product_icon_1.png',
            'product_icon_2'    => 'seeder_images/fi_product_icon_2.png',
            'product_icon_3'    => 'seeder_images/fi_product_icon_3.png',
            'product_icon_4'    => 'seeder_images/fi_product_icon_4.png',
            'product_icon_5'    => 'seeder_images/fi_product_icon_5.png',
            'breadcrumb_bg_img' => 'seeder_images/fi_breadcrumb_bg_img.jpeg',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
